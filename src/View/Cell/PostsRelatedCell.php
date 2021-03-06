<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * PostsRelated cell
 */
class PostsRelatedCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($currentPost, $limit, $title = null)
    {
        $this->loadModel('Posts');
        
        $posts = $this->Posts->getPostsRelated($currentPost, $limit);

        $this->set([
            'title' => $title,
            'posts' => $posts
        ]);
    }
}
