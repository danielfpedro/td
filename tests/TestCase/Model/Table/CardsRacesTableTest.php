<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CardsRacesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CardsRacesTable Test Case
 */
class CardsRacesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CardsRacesTable
     */
    public $CardsRaces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cards_races',
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
        $config = TableRegistry::exists('CardsRaces') ? [] : ['className' => 'App\Model\Table\CardsRacesTable'];
        $this->CardsRaces = TableRegistry::get('CardsRaces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CardsRaces);

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
