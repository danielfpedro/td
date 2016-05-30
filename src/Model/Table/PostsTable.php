<?php
namespace App\Model\Table;

use App\Model\Entity\Post;

use Cake\Event\Event;

use Cake\ORM\EntityInterface;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

use WideImage\WideImage;

/**
 * Posts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Authors
 * @property \Cake\ORM\Association\BelongsTo $Categories
 */
class PostsTable extends Table
{

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
        return $this->find('all', [
            'fields' => [
                'id',
                'title',
                'subtitle',
                'body',
                'slug',
                'video_cover',
                'video_cover_provider',
                'has_cover',
                'pub_date',
                'cover_image',
                'year',
                'month',
                'day',
                'tags'
            ],
            'conditions' => [
                'is_active' => true,
                'Posts.slug' => $slug
            ],
            'contain' => [
                'Categories' => function($q){
                    return $q->select(['name', 'slug']);
                },
                'Authors' => function($q){
                    return $q->select(['id', 'name']);
                },
            ],
        ])
        ->first();
    }

    public function getLatestsPosts($limit = 15)
    {
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
                'is_active' => true,
            ],
            'contain' => [
                'Categories' => function($q){
                    return $q->select(['name', 'slug']);
                },
            ],
            'order' => ['pub_date' => 'DESC'],
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
            ->requirePresence('tags', 'create')
            ->notEmpty('tags');


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
