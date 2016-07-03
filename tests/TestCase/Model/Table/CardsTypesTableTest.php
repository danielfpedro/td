<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CardsTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CardsTypesTable Test Case
 */
class CardsTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CardsTypesTable
     */
    public $CardsTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cards_types',
        'app.cards',
        'app.play_classes',
        'app.decks',
        'app.decks_types',
        'app.decks_classifications',
        'app.posts',
        'app.authors',
        'app.trends',
        'app.categories',
        'app.tags',
        'app.posts_tags',
        'app.decks_cards',
        'app.cards_sets',
        'app.rarities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CardsTypes') ? [] : ['className' => 'App\Model\Table\CardsTypesTable'];
        $this->CardsTypes = TableRegistry::get('CardsTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CardsTypes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
