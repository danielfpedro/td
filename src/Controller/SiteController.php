<?php

namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class SiteController extends AppController
{

	public function beforeRender(Event $event)
	{
		parent::beforeRender($event);
		$this
			->viewBuilder()
			->helpers(['Blog'])
			->layout('site');
	}
	public function home()
	{
		$this->loadModel('Posts');

		$main = $this->Posts->find('all', [
			'contain' => [
				'Categories'
			],
			'limit' => 2
		]);

		$mainSmall = $this->Posts->find('all', [
			'contain' => [
				'Categories'
			],
			'limit' => 3
		]);

		$latest = $this->Posts->find('all', [
			'contain' => [
				'Categories'
			]
		]);

		$this->set([
			'main' => $main,
			'mainSmall' => $mainSmall,
			'latest' => $latest
		]);
	}
	public function view()
	{
		$this->loadModel('Posts');
		$this->loadModel('Trends');
		
		$post = $this->Posts->getForView($this->request['slug']);

		$trend = $this->Trends->newEntity();
		$trend->post_id = $post->id;
		$this->Trends->save($trend);

		$readMore = $this->Posts->find('all', [
			'contain' => [
				'Categories'
			],
			'limit' => 2
		]);
		$this->set([
			'post' => $post,
			'readMore' => $readMore
		]);
	}
	public function decks()
	{
		$this->loadModel('PlayClasses');

		$classes = $this->PlayClasses->getAll();

		$this->set(compact('classes'));
	}
	public function decksByClass()
	{
		
	}
	public function deck()
	{
		
	}
	public function search()
	{
		$this->loadModel('Posts');

		if (!$this->request->query('q')) {
			throw new NotFoundException(__("Página não encontrada."));
		}

		$this->paginate = $this->Posts->getSearch($this->request->query('q'), 20);
		$posts = $this->paginate($this->Posts);

		$this->set(compact('posts'));
	}
	public function category()
	{
		$this->loadModel('Posts');
		$this->loadModel('Tags');

        $tag = $this->Tags->find('all', [
        	'fields' => [
        		'Tags.id',
        		'Tags.name'
        	],
            'conditions' => [
                'Tags.slug' => $this->request->slug
            ]
        ])->first();

		if (!$tag) {
			throw new NotFoundException(__("Página não encontrada."));
		}

		$this->paginate = $this->Posts->getByCategory($tag);
		$posts = $this->paginate($this->Posts);

		$this->set(compact('posts', 'tag'));
	}
	public function author()
	{
		$this->loadModel('Posts');

		$this->paginate = $this->Posts->getByAuthor($author);
		$posts = $this->paginate($this->Posts);

		$this->set(compact('posts'));
	}
}