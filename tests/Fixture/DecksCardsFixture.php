<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DecksCardsFixture
 *
 */
class DecksCardsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'deck_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'card_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'qtd' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_decks_has_cards_cards1_idx' => ['type' => 'index', 'columns' => ['card_id'], 'length' => []],
            'fk_decks_has_cards_decks1_idx' => ['type' => 'index', 'columns' => ['deck_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_decks_has_cards_cards1' => ['type' => 'foreign', 'columns' => ['card_id'], 'references' => ['cards', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_decks_has_cards_decks1' => ['type' => 'foreign', 'columns' => ['deck_id'], 'references' => ['decks', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'deck_id' => 1,
            'card_id' => 1,
            'qtd' => 1
        ],
    ];
}
