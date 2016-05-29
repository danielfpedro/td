<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\MyBlogHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\MyBlogHelper Test Case
 */
class MyBlogHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\MyBlogHelper
     */
    public $MyBlog;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->MyBlog = new MyBlogHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MyBlog);

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
