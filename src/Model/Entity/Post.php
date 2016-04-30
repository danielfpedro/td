<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Inflector;

/**
 * Post Entity.
 *
 * @property int $id
 * @property string $title
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $body
 * @property string $slug
 * @property int $is_active
 * @property string $tags
 * @property string $photo
 * @property string $photo_dir
 * @property int $author_id
 * @property \App\Model\Entity\Author $author
 * @property int $category_id
 * @property \App\Model\Entity\Category $category
 */
class Post extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _getUrlViewParams()
    {
        return [
            'controller' => 'Post',
            'action' => 'view',
            'year' => $this->_properties['year'],
            'month' => $this->_properties['month'],
            'day' => $this->_properties['day'],
            'slug' => $this->_properties['slug'],
        ];
    }

    protected function _getFullImgPath()
    {
        return '../files/posts/photo/' . $this->_properties['photo_dir'] . '/' . $this->_properties['photo'];
    }

    protected function _setTitle($title)
    {
        $this->set('slug', strtolower(Inflector::slug($title)));
        return $title;
    }
    protected function _setPubDate($pubDate)
    {
        $this->set('day', Inflector::slug($pubDate->format('d')));
        $this->set('month', Inflector::slug($pubDate->format('m')));
        $this->set('year', Inflector::slug($pubDate->format('Y')));

        return $pubDate;
    }
}
