<?php
namespace App\View\Cell;

use Cake\View\Cell;

use Cake\ORM\TableRegistry;

/**
 * Trends cell
 */
class TrendsCell extends Cell
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
    public function display($limit = 5)
    {
        $this->loadModel('Posts');

        $this->set([
            'posts' => $this->Posts->getTrends($limit, 7)
        ]);
    }
}
