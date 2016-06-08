<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DecksClassificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DecksClassificationsTable Test Case
 */
class DecksClassificationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DecksClassificationsTable
     */
    public $DecksClassifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.decks_classifications',
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
        $config = TableRegistry::exists('DecksClassifications') ? [] : ['className' => 'App\Model\Table\DecksClassificationsTable'];
        $this->DecksClassifications = TableRegistry::get('DecksClassifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DecksClassifications);

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
