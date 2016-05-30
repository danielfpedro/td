<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Inflector;
use Cake\I18n\Time;

use Cake\View\Helper\UrlHelper;

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

    protected function _getViewUrl()
    {
        return [
            'controller' => 'Site',
            'action' => 'view',
            'year' => $this->_properties['year'],
            'month' => $this->_properties['month'],
            'day' => $this->_properties['day'],
            'slug' => $this->_properties['slug'],
        ];
    }
    protected function _getTagsArray()
    {
        return explode(',', str_replace(', ', ',', $this->_properties['tags']));
    }
    protected function _getTagUrl()
    {
        return ['controller' => 'Site', 'tags'];
    }
    protected function _getFacebookShareUrl()
    {
        $viewUrl = UrlHelper::build($this->_getViewUrl(), true);
        return "https://www.facebook.com/sharer/sharer.php?u=" . $viewUrl;
    }
    protected function _getTwitterShareUrl()
    {
        $viewUrl = UrlHelper::build($this->_getViewUrl(), true);
        return "https://twitter.com/home?status=" . $viewUrl;
    }
    protected function _getGooglePlusShareUrl()
    {
        $viewUrl = UrlHelper::build($this->_getViewUrl(), true);
        return "https://plus.google.com/share?url=" . $viewUrl;
    }
    protected function _getPubDateInWords()
    {
        $config = ['accuracy' => 'day'];
        return (new Time($this->_properties['pub_date']))->timeAgoInWords($config);
    }
    protected function _getTagUrlString()
    {
         return UrlHelper::build(['controller' => 'Site', 'action' => 'tag', 'slug' => $this->_properties['category']['sçug']]);
    }
    protected function _getFullImgPath()
    {
        return '../files/posts/photo/' . $this->_properties['photo_dir'] . '/' . $this->_properties['photo'];
    }
    protected function _getFullImgSquarePath()
    {
        return '../files/posts/photo/' . $this->_properties['photo_dir'] . '/square_' . $this->_properties['photo'];
    }
    protected function _getFullImgPortraitPath()
    {
        return '../files/posts/photo/' . $this->_properties['photo_dir'] . '/portrait_' . $this->_properties['photo'];
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
