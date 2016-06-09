<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DecksCard Entity.
 *
 * @property int $id
 * @property int $deck_id
 * @property \App\Model\Entity\Deck $deck
 * @property int $card_id
 * @property \App\Model\Entity\Card $card
 * @property int $qtd
 */
class DecksCard extends Entity
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
