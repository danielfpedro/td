<?php
namespace App\Model\Table;

use App\Model\Entity\Image;

use Cake\Event\Event;

use Cake\Datasource\EntityInterface;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

use Cake\Validation\Validator;

use Cake\Utility\Inflector;
use WideImage\WideImage;

use Cake\Filesystem\Folder;

/**
 * Images Model
 *
 */
class ImagesTable extends Table
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

        $this->table('images');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function beforeSave(Event $event, EntityInterface $entity)
    {

        if ($entity->photo['error'] == 0) {
        
            $img = WideImage::load($entity->photo['tmp_name']);
            $dir = new Folder(WWW_ROOT . 'files' . DS . 'images' . DS, true);

            $ext = explode('/', $entity->photo['type']);
            /**
             * JPG, JPEG vira jpg
             */
            $ext = (strtolower($ext[1]) == 'png') ? 'png' : 'jpg';
            $quality = ($ext == 'png') ? 8 : 80;

            $name = Inflector::slug($entity->alt) . '.' . $ext;
            $entity->name = $name;

            $img->saveToFile($dir->path . $name, $quality);
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
            ->requirePresence('photo', 'create')
            ->allowEmpty('photo', 'update');

        $validator
            ->requirePresence('tags', 'create')
            ->notEmpty('tags');

        return $validator;
    }
}
