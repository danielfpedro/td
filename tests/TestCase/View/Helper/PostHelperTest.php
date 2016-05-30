<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\PostHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\PostHelper Test Case
 */
class PostHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\PostHelper
     */
    public $Post;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Post = new PostHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Post);

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
