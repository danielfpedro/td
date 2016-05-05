<?php

namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;

class SiteController extends AppController
{
	public function beforeRender(Event $event)
	{
		parent::beforeRender($event);
		$this->viewBuilder()->layout('site');
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
		
		$post = $this->Posts->find('all', [
			'contain' => [
				'Categories'
			]
		])
		->first();
		$this->set(compact('post'));
	}
}