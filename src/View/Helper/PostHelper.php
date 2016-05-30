<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Post helper
 */
class PostHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function showVideo($id, $provider)
    {
    	switch ($provider) {
    		case 'youtube':
    			return '<div class="embed-responsive embed-responsive-16by9"><iframe width="100%" height="auto" src="https://www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe></div>';
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    }

}
