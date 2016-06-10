<?php
namespace App\Model\Table;

use App\Model\Entity\Card;

use Cake\Event\Event;

use Cake\Datasource\EntityInterface;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Text;

use WideImage\WideImage;
use Cake\Filesystem\Folder;

/**
 * Cards Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PlayClasses
 * @property \Cake\ORM\Association\BelongsToMany $Decks
 */
class CardsTable extends Table
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

        $this->table('cards');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PlayClasses', [
            'foreignKey' => 'play_class_id'
        ]);
        $this->belongsTo('CardsSets', [
        ]);
        $this->belongsTo('Rarities', [
        ]);
        $this->belongsToMany('Decks', [
            'through' => 'DecksCards'
        ]);        
    }

    public function beforeSave(Event $event, EntityInterface $entity)
    {

        $currentValue = $this->find('all', ['conditions' => ['id' => (int)$entity->id]])->first();

        if (!$entity->currentValue || !$currentValue->photo_dir) {
            $entity->photo_dir = Text::uuid();
        }

        $imagePath = new Folder(WWW_ROOT . 'files' . DS . 'cards' . DS . $entity->photo_dir . DS, true);

        if ($entity->photo) {

            $img = WideImage::load(WWW_ROOT . 'files' . DS . 'images' . DS . $entity->photo);

            $img
                ->resize(400, 400, 'inside')
                // ->crop($cropPosition[0], $cropPosition[1], $width, $height)
                ->saveToFile($imagePath->path . $entity->photo);
        }
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

        $validator
            ->integer('mana_cost')
            ->allowEmpty('mana_cost');

        $validator
            ->integer('dust_cost')
            ->allowEmpty('dust_cost');

        $validator
            ->integer('rarity')
            ->allowEmpty('rarity');

        $validator
            ->allowEmpty('photo_dir');

        $validator
            ->allowEmpty('photo');

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
        $rules->add($rules->existsIn(['play_class_id'], 'PlayClasses'));
        return $rules;
    }
}
