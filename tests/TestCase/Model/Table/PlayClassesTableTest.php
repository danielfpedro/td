<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlayClassesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlayClassesTable Test Case
 */
class PlayClassesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PlayClassesTable
     */
    public $PlayClasses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.play_classes',
        'app.decks',
        'app.heroes',
        'app.decks_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PlayClasses') ? [] : ['className' => 'App\Model\Table\PlayClassesTable'];
        $this->PlayClasses = TableRegistry::get('PlayClasses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PlayClasses);

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
