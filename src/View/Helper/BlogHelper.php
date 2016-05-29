<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

use Cake\Utility\Inflector;

/**
 * MyBlog helper
 */
class BlogHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function tagSlugfy($name)
    {
    	return Inflector::slug($name);
    }

}
