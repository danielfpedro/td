<?php
namespace App\Model\Table;

use App\Model\Entity\Deck;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Decks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $DecksTypes
 * @property \Cake\ORM\Association\BelongsTo $PlayClasses
 * @property \Cake\ORM\Association\BelongsTo $DecksClassifications
 * @property \Cake\ORM\Association\BelongsTo $Posts
 */
class DecksTable extends Table
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

        $this->table('decks');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('DecksTypes', [
            'foreignKey' => 'decks_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PlayClasses', [
            'foreignKey' => 'play_class_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('DecksClassifications', [
            'foreignKey' => 'decks_classification_id',
            'joinType' => 'INNER'
        ]);
        $this->hasOne('Posts', [
        ]);

        $this->belongsToMany('Cards', [
            'through' => 'DecksCards'
        ]);
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
        $rules->add($rules->existsIn(['decks_type_id'], 'DecksTypes'));
        $rules->add($rules->existsIn(['play_class_id'], 'PlayClasses'));
        $rules->add($rules->existsIn(['decks_classification_id'], 'DecksClassifications'));
        $rules->add($rules->existsIn(['post_id'], 'Posts'));
        return $rules;
    }
}
