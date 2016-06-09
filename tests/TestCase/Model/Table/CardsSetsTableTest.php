<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CardsSetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CardsSetsTable Test Case
 */
class CardsSetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CardsSetsTable
     */
    public $CardsSets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cards_sets',
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
        'app.posts_tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CardsSets') ? [] : ['className' => 'App\Model\Table\CardsSetsTable'];
        $this->CardsSets = TableRegistry::get('CardsSets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CardsSets);

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
