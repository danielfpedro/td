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

use Cake\Utility\Inflector;

use WideImage\WideImage;
use Cake\Filesystem\Folder;

use Cake\ORM\TableRegistry;

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
        $this->belongsTo('CardsRaces', [
        ]);
        $this->belongsTo('CardsTypes', [
        ]);
        $this->belongsToMany('Decks', [
            'through' => 'DecksCards'
        ]);        
    }

    private function _createTags($entity)
    {
        $newTags[] = $entity->name;
        $newTags[] = 'Carta';
        if ($entity->tags) {
            $newTags[] = $entity->tags;
        }
        $newTags[] = 'custo ' . $entity->mana_cost;

        /**
         * Só inclui card set se for diferente de básico
         */
        if ($entity->cards_set_id != 3) {
            $cardSet = $this->CardsSets->get($entity->cards_set_id);
            $newTags[] = $cardSet->name;
        }

        $cardType = $this->CardsTypes->get($entity->cards_type_id);
        $newTags[] = $cardType->name;

        if ($entity->card_race) {
            $cardRace = $this->CardsRaces->get($entity->cards_race_id);
            $newTags[] = $cardRace->name;
        }

        $rarity = $this->Rarities->get($entity->rarity_id);
        $newTags[] = $rarity->name;

        if ($entity->play_class_id) {
            $playClass = $this->PlayClasses->get($entity->play_class_id);
            $newTags[] = 'Carta de Classe';
            $newTags[] = $playClass->name;
        }

        if ($entity->tags) {
            $entity->tags .= ', ';
        }
        $entity->tags = implode(',', $newTags);

        return $entity->tags;
    }

    public function beforeSave(Event $event, EntityInterface $entity)
    {
        /**
         * Só faz isso se estiver adicionando senao iria duplicar as tags em cada edição.
         */
        if (!$entity->id) {
            $entity->tags = $this->_createTags($entity);
        }
        
        if ($entity->photo_file['error'] == 0) {
            $ext = explode('/', $entity->photo_file['type']);
            /**
             * JPG, JPEG vira jpg
             */
            $ext = (strtolower($ext[1]) == 'png') ? 'png' : 'jpg';
            $quality = ($ext == 'png') ? 8 : 80;

            $imagePath = new Folder(WWW_ROOT . 'files' . DS . 'images' . DS, true);

            $img = WideImage::load($entity->photo_file['tmp_name']);

            /**
             * Coloco o nome da imagem na entity que vou usar no afterSave para salvar a imagem
             */
            $entity->image_name = Inflector::slug($entity->name, '-') . '.' . $ext;

            $img
                ->saveToFile($imagePath->path . $entity->image_name, $quality);
        }
    }

    public function afterSave(Event $event, EntityInterface $entity)
    {
        if ($entity->photo_file['error'] == 0) {
            $images = TableRegistry::get('Images');
            $newImage = $images->newEntity([
                'alt' => $entity->name,
                'tags' => $entity->tags,
                'name' => $entity->image_name,
                'photo' => ['error' => 4]
            ]);

            $images->save($newImage);
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
