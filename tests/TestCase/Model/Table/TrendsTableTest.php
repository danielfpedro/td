<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrendsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrendsTable Test Case
 */
class TrendsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TrendsTable
     */
    public $Trends;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trends',
        'app.posts',
        'app.authors',
        'app.categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Trends') ? [] : ['className' => 'App\Model\Table\TrendsTable'];
        $this->Trends = TableRegistry::get('Trends', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Trends);

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
