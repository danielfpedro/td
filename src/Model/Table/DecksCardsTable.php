<?php
namespace App\Model\Table;

use App\Model\Entity\DecksCard;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DecksCards Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Decks
 * @property \Cake\ORM\Association\BelongsTo $Cards
 */
class DecksCardsTable extends Table
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

        $this->table('decks_cards');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Decks', [
            'foreignKey' => 'deck_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cards', [
            'foreignKey' => 'card_id',
            'joinType' => 'INNER'
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

        $validator
            ->integer('qtd')
            ->allowEmpty('qtd');

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
        $rules->add($rules->existsIn(['deck_id'], 'Decks'));
        $rules->add($rules->existsIn(['card_id'], 'Cards'));
        return $rules;
    }
}
