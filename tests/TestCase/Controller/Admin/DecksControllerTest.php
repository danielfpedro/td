<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\DecksController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\DecksController Test Case
 */
class DecksControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.cards',
        'app.cards_sets',
        'app.rarities',
        'app.cards_races',
        'app.cards_types',
        'app.decks_cards'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
