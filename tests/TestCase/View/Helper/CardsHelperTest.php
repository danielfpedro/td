<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\CardsHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\CardsHelper Test Case
 */
class CardsHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\CardsHelper
     */
    public $Cards;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Cards = new CardsHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cards);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
