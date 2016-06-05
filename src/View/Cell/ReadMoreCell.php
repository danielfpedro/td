<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * ReadMore cell
 */
class ReadMoreCell extends Cell
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
    public function display($currentPost, $limit = 4)
    {
        $this->loadModel('Posts');

        $posts = $this->Posts->getReadMore($currentPost, $limit);

        return $this->set(compact('posts'));

    }
}
