<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Post helper
 */
class PostHelper extends Helper
{

    public $helpers = ['Html', 'Text'];

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

    public function parseText($text)
    {
        $text = $this->_parseImage($text);
        return $this->Text->autoParagraph($text);
    }
    protected function _parseImage($text)
    {
        $pattern = '/(\[img\])(\{.+\})/';
        
        preg_match_all($pattern, $text, $matches, PREG_OFFSET_CAPTURE);

        if ($matches) {
            foreach ($matches[0] as $key => $match) {
                $options = json_decode($matches[2][$key][0], true);

                $img = $this->_getImage($options);

                $text = str_replace($match[0], $img, $text);
            }
        }

        return $text;
    }
    protected function _getImage($options)
    {
        if ($options) {
            $src = $options['src'];
            unset($options['src']);
            return $this->Html->image('../files/images/' . $src, $options);
        }
    }

}
