<?php
namespace App\Model\Table;

use App\Model\Entity\Post;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

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
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);

        $this->addBehavior('Proffer.Proffer', [
            'photo' => [    // The name of your upload field
                'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
                'dir' => 'photo_dir',   // The name of the field to store the folder
                'thumbnailSizes' => [ // Declare your thumbnails
                    'square' => [   // Define the prefix of your thumbnail
                        'w' => 200, // Width
                        'h' => 200, // Height
                        'crop' => true,  // Crop will crop the image as well as resize it
                        'jpeg_quality'  => 100,
                        'png_compression_level' => 9
                    ],
                    'portrait' => [     // Define a second thumbnail
                        'w' => 100,
                        'h' => 300
                    ],
                ],
                'thumbnailMethod' => 'Gd'  // Options are Imagick, Gd or Gmagick
            ]
        ]);
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
                'photo',
                'photo_dir'
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
                'photo',
                'photo_dir'
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
            ->allowEmpty('photo_dir');
            
        $validator
            ->allowEmpty('photo');

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
