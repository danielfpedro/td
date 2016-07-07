<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

use Cake\Utility\Inflector;
use Cake\View\Helper\UrlHelper;

/**
 * Card Entity.
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $mana_cost
 * @property int $dust_cost
 * @property int $rarity
 * @property int $play_class_id
 * @property \App\Model\Entity\PlayClass $play_class
 * @property string $photo_dir
 * @property string $photo
 * @property \App\Model\Entity\Deck[] $decks
 */
class Card extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected $_virtual = [
        'img'
    ];

    protected function _getImg()
    {
        return UrlHelper::build('/files/images/' . Inflector::slug($this->_properties['name'], '-') . '.png', true);
    }
}
