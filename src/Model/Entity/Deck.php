<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deck Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $decks_type_id
 * @property \App\Model\Entity\DecksType $decks_type
 * @property int $play_class_id
 * @property \App\Model\Entity\PlayClass $play_class
 * @property int $decks_classification_id
 * @property \App\Model\Entity\DecksClassification $decks_classification
 * @property int $post_id
 * @property \App\Model\Entity\Post $post
 */
class Deck extends Entity
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
        'id' => false,
    ];
}
