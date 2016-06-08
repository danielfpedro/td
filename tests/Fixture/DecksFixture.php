<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DecksFixture
 *
 */
class DecksFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'hero_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'decks_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_decks_heroes1_idx' => ['type' => 'index', 'columns' => ['hero_id'], 'length' => []],
            'fk_decks_decks_types1_idx' => ['type' => 'index', 'columns' => ['decks_type_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_decks_decks_types1' => ['type' => 'foreign', 'columns' => ['decks_type_id'], 'references' => ['decks_types', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_decks_heroes1' => ['type' => 'foreign', 'columns' => ['hero_id'], 'references' => ['heroes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'created' => '2016-06-08 02:06:58',
            'modified' => '2016-06-08 02:06:58',
            'hero_id' => 1,
            'decks_type_id' => 1
        ],
    ];
}
