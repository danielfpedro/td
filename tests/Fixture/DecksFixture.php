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
        'decks_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'play_class_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'decks_classification_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'post_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_decks_decks_types1_idx' => ['type' => 'index', 'columns' => ['decks_type_id'], 'length' => []],
            'fk_decks_play_classes1_idx' => ['type' => 'index', 'columns' => ['play_class_id'], 'length' => []],
            'fk_decks_decks_classifications1_idx' => ['type' => 'index', 'columns' => ['decks_classification_id'], 'length' => []],
            'fk_decks_posts1_idx' => ['type' => 'index', 'columns' => ['post_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_decks_decks_classifications1' => ['type' => 'foreign', 'columns' => ['decks_classification_id'], 'references' => ['decks_classifications', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_decks_decks_types1' => ['type' => 'foreign', 'columns' => ['decks_type_id'], 'references' => ['decks_types', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_decks_play_classes1' => ['type' => 'foreign', 'columns' => ['play_class_id'], 'references' => ['play_classes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_decks_posts1' => ['type' => 'foreign', 'columns' => ['post_id'], 'references' => ['posts', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'created' => '2016-06-08 10:41:03',
            'modified' => '2016-06-08 10:41:03',
            'decks_type_id' => 1,
            'play_class_id' => 1,
            'decks_classification_id' => 1,
            'post_id' => 1
        ],
    ];
}
