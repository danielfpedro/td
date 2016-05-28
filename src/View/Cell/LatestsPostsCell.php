<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * LatestsPosts cell
 */
class LatestsPostsCell extends Cell
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
    public function display()
    {
        $this->loadModel('Posts');

        $posts = $this->Posts->getLatestsPosts();

        $this->set(compact('posts'));
    }
}
