<?php

namespace App\Model\Entity;

class Navbar
{

	public $socialNetworks = [
		[
			'name' => 'Facebook',
			'faIcon' => 'facebook',
			'url' => 'http://facebook.com/papodetaverna',
			'class' => 'facebook'
		],
		[
			'name' => 'Twitter',
			'faIcon' => 'twitter',
			'url' => 'http://twitter.com/papodetaverna',
			'class' => 'twitter'
		],
		[
			'name' => 'Youtube',
			'faIcon' => 'youtube-play',
			'url' => 'http://youtube.com/papodetaverna',
			'class' => 'youtube'
		],
	];

	public $mainMenu = [
	    [
	        'label' => 'Notícias',
	        'url' => [
	            'controller' => 'Site',
	            'action' => 'category',
	            'slug' => 'noticia'
	        ]
	    ],
	    [
	        'label' => 'Guias',
	        'url' => [
	            'controller' => 'Site',
	            'action' => 'category',
	            'slug' => 'guia'
	        ]
	    ],
	    [
	        'label' => 'Decks',
	        'items' => [
	            [
	                'label' => 'Todos',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decks',
	                    'decks'
	                ]
	            ],

	            'divider',

	            [
	                'label' => 'Bruxo',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decks',
	                    '#' => 'mage'
	                ]
	            ],
	            [
	                'label' => 'Caçador',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decks',
	                    '#' => 'mage'
	                ]
	            ],	
	            [
	                'label' => 'Druida',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decks',
	                    '#' => 'mage'
	                ]
	            ],
	            [
	                'label' => 'Guerreiro',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decks',
	                    '#' => 'mage'
	                ]
	            ],	
	            [
	                'label' => 'Ladino',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decks',
	                    '#' => 'mage'
	                ]
	            ],
	            [
	                'label' => 'Mago',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decks',
	                    '#' => 'mage'
	                ]
	            ],
	            [
	                'label' => 'Paladino',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decks',
	                    '#' => 'mage'
	                ]
	            ],                        
	            [
	                'label' => 'Sacerdote',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decks',
	                    '#' => 'mage'
	                ]
	            ],	
	            [
	                'label' => 'Xamã',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decks',
	                    '#' => 'mage'
	                ]
	            ],     
	        ]
	    ]
	];
}