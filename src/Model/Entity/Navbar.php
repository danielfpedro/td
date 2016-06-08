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
	                    'action' => 'decks'
	                ]
	            ],

	            'divider',

	            [
	                'label' => 'Bruxo',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decksByClass',
	                    'slug' => 'bruxo'
	                ]
	            ],
	            [
	                'label' => 'Caçador',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decksByClass',
	                    'slug' => 'cacador'
	                ]
	            ],	
	            [
	                'label' => 'Druida',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decksByClass',
	                    'slug' => 'druida'
	                ]
	            ],
	            [
	                'label' => 'Guerreiro',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decksByClass',
	                    'slug' => 'guerreiro'
	                ]
	            ],	
	            [
	                'label' => 'Ladino',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decksByClass',
	                    'slug' => 'ladino'
	                ]
	            ],
	            [
	                'label' => 'Mago',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decksByClass',
	                    'slug' => 'mago'
	                ]
	            ],
	            [
	                'label' => 'Paladino',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decksByClass',
	                    'slug' => 'paladino'
	                ]
	            ],                        
	            [
	                'label' => 'Sacerdote',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decksByClass',
	                    'slug' => 'sacerdote'
	                ]
	            ],	
	            [
	                'label' => 'Xamã',
	                'url' => [
	                    'controller' => 'Site',
	                    'action' => 'decksByClass',
	                    'slug' => 'xama'
	                ]
	            ],     
	        ]
	    ]
	];
}