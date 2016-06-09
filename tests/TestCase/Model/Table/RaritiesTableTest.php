<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RaritiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RaritiesTable Test Case
 */
class RaritiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RaritiesTable
     */
    public $Rarities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Rarities') ? [] : ['className' => 'App\Model\Table\RaritiesTable'];
        $this->Rarities = TableRegistry::get('Rarities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rarities);

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
