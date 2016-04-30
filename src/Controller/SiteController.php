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
		$this->loadmodel('Posts');

		$main = $this->Posts->find('all', [
			'contain' => [
				'Categories'
			],
			'limit' => 2
		]);

		$this->set([
			'main' => $main
		]);
	}
}