<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CardsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CardsController Test Case
 */
class CardsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
