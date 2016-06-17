<?php
namespace App\Model\Table;

use App\Model\Entity\Post;

use Cake\Event\Event;

use Cake\Datasource\EntityInterface;
use Cake\ORM\Query;
use Cake\ORM\ArrayObject;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

use Cake\Utility\Inflector;

use Cake\Collection\Collection;

use WideImage\WideImage;

/**
 * Posts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Authors
 * @property \Cake\ORM\Association\BelongsTo $Categories
 */
class PostsTable extends Table
{
    ////////////
    // Config //
    ////////////
    /**
     * O Quantidade máxima de caracteres que uma query da busca pode conter, para não 
     * sobrecarregar o banco de dados com um termo gigante
     * @var integer
     */
    protected $_searchQueryMaxChars = 18;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('posts');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Authors', [
            'foreignKey' => 'author_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Trends', [
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsToMany('Tags', [
            'foreignKey' => 'post_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'posts_tags'
        ]);

        $this->belongsTo('Decks', [
        ]);

    }

    public function beforeMarshal(Event $event, $data)
    {
        $tagsArray = explode(',', $data['tags_string']);

        $category = $this->Categories->get($data['category_id']);
        $tagsArray[] = $category['name'];

        foreach ($tagsArray as $tagName) {

            $tagName = trim($tagName);
            $tagSlug = strtolower(Inflector::slug($tagName));

            $tag = $this->Tags->find('all', [
                'fields' => [
                    'Tags.id',
                    'Tags.name',
                    'Tags.slug'
                ],
                'conditions' => [
                    'Tags.slug' => $tagSlug
                ]
            ])->first();

            if (!$tag) {
                $newTagData = [
                    'name' => $tagName,
                    'slug' => $tagSlug
                ];

                $newTag = $this->Tags->newEntity($newTagData);

                $this->Tags->save($newTag);
            }
        }

        // debug($data);
        // exit();
    }

    public function beforeSave(Event $event, EntityInterface $entity)
    {

        $imagePath = WWW_ROOT . 'files' . DS . 'images' . DS;

        if ($entity->thumb_image) {
            $cropPosition = explode(',', $entity->thumb_image_crop_position);

            $img = WideImage::load($imagePath . $entity->thumb_image);

            $img
                ->resize(400, 400, 'outside')
                ->crop($cropPosition[0], $cropPosition[1], 400, 400)
                ->saveToFile($imagePath . 'square_' . $entity->thumb_image);
        }

        if ($entity->cover_image) {
            $cropPosition = explode(',', $entity->cover_image_crop_position);

            $img = WideImage::load($imagePath . $entity->cover_image);

            $maxWith = 1000;

            $width = $img->getWidth();

            if ($width > $maxWith) {
                $width = $maxWith;
            }

            $height = $width / 2;

            $img
                ->resize($width, $height, 'outside')
                ->crop($cropPosition[0], $cropPosition[1], $width, $height)
                ->saveToFile($imagePath . 'cover_' . $entity->cover_image);
        }
    }

    public function getPostsRelated($currentPost, $limit)
    {
        $conditions = ['Posts.is_active' => true];

        if ($currentPost) {
            $conditions['Posts.id !='] = $currentPost->id;
        }

        return $this->find('all', [
            'fields' => [
                'Posts.id',
                'Posts.title',
                'Posts.slug',
                'Posts.pub_date',
                'Posts.thumb_image',
                'Posts.day',
                'Posts.month',
                'Posts.year',
                'Posts.cover_image'
            ],
            'conditions' => $conditions,
            'contain' => [
                'Authors' => function($q){
                    return $q->select(['Authors.id', 'Authors.name']);
                }
            ],
            'order' => 'rand()',
            'limit' => $limit
        ]);
    }

    public function getReadMore($currentPost, $limit)
    {
        return $this->find('all', [
            'fields' => [
                'Posts.id',
                'Posts.title',
                'Posts.slug',
                'Posts.pub_date',
                'Posts.day',
                'Posts.month',
                'Posts.year',
                'Posts.cover_image'
            ],
            'conditions' => [
                'Posts.is_active' => true,
                'Posts.id !=' => $currentPost->id,
                ''
            ],
            'contain' => [
                'Authors' => function($q){
                    return $q->select(['Authors.id', 'Authors.name']);
                }
            ],
            'order' => 'rand()',
            'limit' => $limit
        ]);
    }

    /**
     * @param  int $limit Quantidade de posts
     * @param  int $daysAgo Quanto tempo atrás serão selecionados os trends 
     * @return obj Posts
     */
    public function getTrends($limit, $daysAgo)
    {
        $now = Time::now();

        $trend = $this->Trends->find();

        $trend
            ->select([
                'post_id',
                'total' => $trend->func()->count('post_id')
            ])
            ->where([
                'created >=' => $now->subDays($daysAgo)
            ])
            ->group('post_id')
            ->order(['total' => 'DESC'])
            ->limit($limit);

        $ids = [];
        $postsQtd = [];
        foreach ($trend as $value) {
            $ids[] = $value['post_id'];
            $postsQtd[$value['post_id']]['total'] = $value['total'];
        }

        $conditions = [];

        if ($ids) {
            $conditions['id IN'] = $ids;
        }

        $posts = $this->find('all', [
            'fields' => [
                'id',
                'title',
                'slug',
                'year',
                'month',
                'day'
            ],
            'conditions' => $conditions
        ]);

        $new = $posts->map(function($post) use ($postsQtd){
            $post->total = (isset($postsQtd[$post->id]['total'])) ? $postsQtd[$post->id]['total'] : 0;
            return $post;
        });

        return $new->sortBy('total');
    }

    public function getForView($slug)
    {
        $post = $this->find('all', [
            'fields' => [
                'Posts.id',
                'Posts.title',
                'Posts.subtitle',
                'Posts.body',
                'Posts.slug',
                'Posts.video_cover',
                'Posts.video_cover_provider',
                'Posts.has_cover',
                'Posts.pub_date',
                'Posts.cover_image',
                'Posts.year',
                'Posts.month',
                'Posts.day',
                'Posts.tags_string',
                'Posts.deck_id',
            ],
            'conditions' => [
                'Posts.is_active' => true,
                'Posts.slug' => $slug
            ],
            'contain' => [
                'Categories' => function($q){
                    return $q->select(['name', 'slug']);
                },
                'Authors' => function($q){
                    return $q->select(['id', 'name']);
                },
                'Decks' => function($q){
                    return $q->select(['id']);
                },
            ],
        ])
        ->first();

        $post->deck = null;

        if ($post->deck_id) {
            $deck = $this
                ->Decks
                ->find('all', [
                    'conditions' => [
                        'Decks.id' => $post->deck_id
                    ],
                    'contain' => [
                        'Cards' => function($q){
                            return $q
                                ->contain(['CardsSets'])
                                ->order(['mana_cost']);
                        },
                        'PlayClasses'
                    ]
                ])
                ->first();

            /**
             * Agrupo cards por de classe e neutras
             */
            $cards = [];
            foreach ($deck->cards as $card) {
                $index = ($card->play_class_id) ? 0 : 1;

                $cards[$index][] = $card;
            }
            $deck->cards = $cards;
            // debug($cards);
            // exit();
            $post->deck = $deck;
        }

        return $post;
    }

    public function getByCategory($category, $limit = 15)
    {
        /**
         * Troca os espaços vazios por %, técnica basica no LIKE
         */
        $categoryName = '%'.str_replace(' ', '%', $category->name).'%';

        return [
            'fields' => [
                'Posts.title',
                'Posts.subtitle',
                'Posts.slug',
                'Posts.pub_date',
                'Posts.year',
                'Posts.month',
                'Posts.day',
                'Posts.thumb_image',
            ],
            'conditions' => [
                'Posts.is_active' => true,
                'Posts.tags_string LIKE' => $categoryName
            ],
            'contain' => [
                'Categories' => function($q){
                    return $q->select(['Categories.name', 'Categories.slug']);
                },
            ],
            'order' => ['Posts.pub_date' => 'DESC'],
            'limit' => $limit
        ];
    }

    public function getSearch($query, $limit = 15)
    {
        /**
         * Não importa o quanto ele escreve eu só levo em conta os 18 primeiros characters
         */
        $query = substr($query, 0, $this->_searchQueryMaxChars);
        /**
         * Troca os espaços vazios por %, técnica basica no LIKE
         */
        $query = '%'.str_replace(' ', '%', $query).'%';

        return [
            'fields' => [
                'Posts.title',
                'Posts.subtitle',
                'Posts.slug',
                'Posts.pub_date',
                'Posts.year',
                'Posts.month',
                'Posts.day',
                'Posts.thumb_image',
            ],
            'conditions' => [
                'Posts.is_active' => true,
                'Posts.tags_string LIKE' => $query
            ],
            'contain' => [
                'Categories' => function($q){
                    return $q->select(['name', 'slug']);
                },
            ],
            'order' => ['pub_date' => 'DESC'],
            'limit' => $limit
        ];
    }

    public function getLatestsPosts($limit = 15, $page)
    {
        $page = (!$page) ? 0 : $page;
        $page = ($page - 1) * $limit;

        return $this->find('all', [
            'fields' => [
                'title',
                'subtitle',
                'slug',
                'pub_date',
                'year',
                'month',
                'day',
                'thumb_image',
            ],
            'conditions' => [
                'Posts.is_active' => true,
            ],
            'contain' => [
                'Categories' => function($q){
                    return $q->select(['name', 'slug']);
                },
            ],
            'order' => ['pub_date' => 'DESC'],
            'offset' => $page,
            'limit' => $limit
        ]);
    }

    public function getHomeMain($limit = 5)
    {
        $posts = $this->find('all', [
            'fields' => [
                'title',
                'slug',
                'year',
                'month',
                'day',
                'cover_image',
            ],
            'conditions' => [
                'home_main' => true,
                'is_active' => true,
            ],
            'order' => ['home_main' => 'DESC'],
            'limit' => $limit
        ]);

        // Divido em chunk de 2
        $posts = $posts->chunk(2)->toArray();
        // 2 grandes obrigatórios
        // 3 menores não obrigatórios porém se posuir tem que ser os tres, por exemplo, eu nunca poderei ter os 2 grandes e 1 pequeno.
        if (isset($posts[2])) {

            $posts[2][] = $posts[4][0];
            unset($posts[4]);
        }

        return $posts;
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->integer('is_active')
            ->requirePresence('is_active', 'create')
            ->notEmpty('is_active');

        $validator
            ->requirePresence('tags_string', 'create')
            ->notEmpty('tags_string');


        $validator
            ->requirePresence('pub_date', 'create')
            ->notEmpty('pub_date')
            ->datetime('pub_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['author_id'], 'Authors'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        return $rules;
    }
}
