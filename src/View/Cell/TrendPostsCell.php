<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * TrendPosts cell
 */
class TrendPostsCell extends Cell
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
        
        $trend = $this->Posts->find('all', [
            'contain' => [
                'Categories'
            ],
            'limit' => 6
        ]);
        $this->set(compact('trend'));
    }
}
