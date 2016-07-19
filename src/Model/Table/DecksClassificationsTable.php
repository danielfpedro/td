<?php
namespace App\Model\Table;

use App\Model\Entity\DecksClassification;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DecksClassifications Model
 *
 * @property \Cake\ORM\Association\HasMany $Decks
 */
class DecksClassificationsTable extends Table
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

        $this->table('decks_classifications');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Decks', [
            'foreignKey' => 'decks_classification_id'
        ]);
    }

    public function getByClass($classSlug)
    {
        $playClass = $this
            ->Decks
            ->PlayClasses
            ->find('all', [
                'fields' => [
                    'PlayClasses.id',
                    'PlayClasses.name',
                    'PlayClasses.slug',
                    'PlayClasses.bio',
                ],
                'conditions' => [
                'PlayClasses.slug' => $classSlug
            ]
        ])
        ->first();

        $decksClassifications = $this->find('all', [
            'contain' => [
                'Decks' => function($q) use ($playClass){
                    return $q
                        ->where(['Decks.play_class_id' => $playClass->id])
                        ->contain([
                            'Posts',
                            'DecksTypes'
                        ]);
                },
            ]
        ]);

        return ['playClass' => $playClass, 'decksClassifications' => $decksClassifications];
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
            ->allowEmpty('name');

        return $validator;
    }
}
