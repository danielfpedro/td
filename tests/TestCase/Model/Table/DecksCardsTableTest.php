<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DecksCardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DecksCardsTable Test Case
 */
class DecksCardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DecksCardsTable
     */
    public $DecksCards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.decks_cards',
        'app.decks',
        'app.decks_types',
        'app.play_classes',
        'app.decks_classifications',
        'app.posts',
        'app.authors',
        'app.trends',
        'app.categories',
        'app.tags',
        'app.posts_tags',
        'app.cards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DecksCards') ? [] : ['className' => 'App\Model\Table\DecksCardsTable'];
        $this->DecksCards = TableRegistry::get('DecksCards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DecksCards);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
