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
        //$text = nl2br($text);
        $text = $this->_parseImage($text);
        $text = $this->_parseVideo($text);
        return '<div class="text-post">' . $text . '</div>';
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
    protected function _parseVideo($text)
    {
        $pattern = '/(\[video\])(\{.+\})/';
        
        preg_match_all($pattern, $text, $matches, PREG_OFFSET_CAPTURE);

        if ($matches) {
            foreach ($matches[0] as $key => $match) {
                $options = json_decode($matches[2][$key][0], true);

                $video = $this->_getVideo($options);

                $text = str_replace($match[0], $video, $text);
            }
        }

        return $text;
    }
    protected function _getImage($options)
    {
        if ($options) {
            $src = $options['src'];
            unset($options['src']);
            $image = $this->Html->image('../files/images/' . $src, $options);

            if (isset($options['data-title'])) {
                $image .= '<div class="image-description">' . $options['data-title'] . '</div>';
            }
            
            return $image;
        }
    }
    protected function _getVideo($options)
    {
        if ($options) {
            switch ($options['provider']) {
                case 'youtube':
                    $src = 'https://www.youtube.com/embed/' . $options['src'];
                    $video = "<div class=\"video-wrap embed-responsive embed-responsive-16by9\">
                        <iframe
                            width=\"100%\"
                            src=\"" . $src . "\"
                            frameborder=\"0\"
                            allowfullscreen>
                        </iframe>
                    </div>";
                    break;
            }

            if (isset($options['data-title'])) {
                $video .= '<div class="image-description">' . $options['data-title'] . '</div>';
            }
            
            return htmlspecialchars_decode($video);
        }
    }

}
