<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DecksTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DecksTypesTable Test Case
 */
class DecksTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DecksTypesTable
     */
    public $DecksTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.decks_types',
        'app.decks',
        'app.play_classes',
        'app.decks_classifications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DecksTypes') ? [] : ['className' => 'App\Model\Table\DecksTypesTable'];
        $this->DecksTypes = TableRegistry::get('DecksTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DecksTypes);

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
