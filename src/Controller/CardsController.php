<?php

namespace App\Controller;

use App\Controller\AppController;

use GuzzleHttp\Client;
use Cake\Utility\Text;
use Cake\Utility\Inflector;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

use WideImage\WideImage;

/**
 * Cards Controller
 *
 * @property \App\Model\Table\CardsTable $Cards
 */
class CardsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function suckForImg()
    {
        $cards = $this->Cards->find('all', [
            'contain' => [
                'Rarities',
                'CardsRaces',
                'CardsSets',
                'CardsTypes'
            ]
        ]);

        $this->viewBuilder()->layout('json');

        $url = 'https://omgvamp-hearthstone-v1.p.mashape.com/cards/';
        $key = 'MsGzaHtBCPmsh23JKgh4K8FNMl2Ap1uXfoyjsnOxBYFvYuhW49';

        $client = new Client(['base_uri' => $url]);

        foreach ($cards as $key => $card) {
            /**
             * Pego o nome da pasta do card, se não ouver eu crio
             */
            if (!$card->photo_dir) {
                $card->photo_dir = Text::uuid();
            }

            $dir = new Folder(WWW_ROOT . DS . 'files' . DS . 'images' . DS . 'cards' . DS . $card->photo_dir, true);
            $dirImages = new Folder(WWW_ROOT . DS . 'files' . DS . 'images', true);

            $this->Cards->save($card);

            $response = $client->request('GET', $card->game_uid, [
                'query' => ['locale' => 'ptBR'],
                'verify' => false,
                'headers' => ['X-Mashape-Key' => 'MsGzaHtBCPmsh23JKgh4K8FNMl2Ap1uXfoyjsnOxBYFvYuhW49']
            ]);
            $content = json_decode($response->getBody()->getContents());        

            $img = WideImage::load($content[0]->img);
            $img->saveToFile($dir->path . DS . strtolower(Inflector::slug($card->name)) . '.png', 9);

            $img->saveToFile($dirImages->path . DS . Inflector::slug($card->name) . '.png', 9);

            $tags = [
                'Carta',
                'Custo ' . $card->mana_cost,
                $card->rarity->name,
                $card->cards_set->name,
                $card->cards_type->name,
            ];

            if ($card->cards_race) {
                $tags[] = $card->cards_race->name;
            }

            $this->loadModel('Images');

            $image = $this->Images->find('all', [
                'conditions' => [
                    'game_uid' => $card->game_uid
                ]
            ])
            ->first();

            if (!$image) {
                $image = $this->Images->newEntity();
            }

            $image->name = Inflector::slug($card->name);
            $image->alt = $card->name;
            $image->tags = implode($tags, ',');
            $image->game_uid = $card->game_uid;

            $this->Images->save($image);
        }

        $this->autoRender = false;
    }

    public function suckFromApi()
    {
        $client = new Client(['base_uri' => 'http://hearthstonelabs.com/v1/cardDB/ptBR/']);
        $response = $client->request('GET');
        $content = json_decode($response->getBody()->getContents());

        $cards = [];
        $already = [];

        foreach ($content as $key => $card) {

            $cards[$key]['game_uid'] = $card->gameId;
            $cards[$key]['locale'] = $card->language;
            $cards[$key]['name'] = $card->title;
            $cards[$key]['text'] = $card->text;
            $cards[$key]['flavor'] = $card->flavor;
            $cards[$key]['mana_cost'] = $card->cost;
            $cards[$key]['attack'] = $card->attack;
            $cards[$key]['health'] = $card->health;

            $cards[$key]['cards_set_id'] = $this->_getCardSetId($card->set);
            $cards[$key]['rarity_id'] = $this->_getCardRarityId($card->rarity);
            $cards[$key]['cards_type_id'] = $this->_getCardTypeId($card->type);
            $cards[$key]['play_class_id'] = $this->_getCardPlayClassId($card->playerClass);
            $cards[$key]['cards_race_id'] = $this->_getCardRaceId($card->race);

            /**
             * Se for algum set bizarro do tipo taverna, cheat ou algo do tipo eu passo a bola para o Romário.
             */
            if (!$cards[$key]['cards_set_id']) {
                continue;
            }

            // if ($card->race) {
            //     if (!in_array($card->race, $already)) {
            //         debug($card->race);
            //         $already[] = $card->race;
            //     }
            // }
            
            $checkCard = $this->Cards->find('all', [
                'conditions' => [
                    'game_uid' => $card->gameId,
                    'locale' => $card->language
                ]
            ])
            ->first();

            if ($checkCard) {
                $entity = $this->Cards->get($checkCard->id);
                $entity = $this->Cards->patchEntity($entity, $cards[$key]);
            } else {
                $entity = $this->Cards->newEntity($cards[$key]);
            }
            /**
             * Adiciona UUID caso ainda não tenha,
             * serve para salvar a pasta das imagens e evitar que alguem cave e sugue tudo.
             */
            if (!$entity->uuid) {
                $entity->uuid = Text::uuid();
            }

            // debug($cards[$key]);
            // exit();
            
            // debug($entity);

            if (!$this->Cards->save($entity)) {
                echo 'Ocoreu um erro ao tentar salvar';
                debug($entity);
            }

            // if (count($cards) >= 5) {
            //     break;
            // }

            // debug($cards[$key]['rarity_id']);
        }
        debug($cards);
        //debug($content);

        $this->autoRender = false;
    }

    private function _getCardRaceId($data)
    {
        $values = [
            'murloc',
            'mechanical',
            'pirate',
            'beast',
            'demon',
            'dragon',
            'totem',
        ];
        foreach ($values as $key => $value) {
            if (strtolower($data) == $value) {
                return ($key + 1);
            }
        }
        return null;
    }

    private function _getCardPlayClassId($data)
    {
        $values = [
            'priest',
            'hunter',
            'shaman',
            'rogue',
            'paladin',
            'warlock',
            'druid',
            'warrior',
            'mage',
        ];
        foreach ($values as $key => $value) {
            if (strtolower($data) == $value) {
                return ($key + 1);
            }
        }
        return null;
    }

    private function _getCardTypeId($data)
    {
        $values = [
            'weapon',
            'spell',
            'minion',
        ];
        foreach ($values as $key => $value) {
            if (strtolower($data) == $value) {
                return ($key + 1);
            }
        }
        return null;
    }

    private function _getCardRarityId($data)
    {
        $values = [
            'legendary',
            'common',
            'rare',
            'epic',
            'free',
        ];
        foreach ($values as $key => $value) {
            if (strtolower($data) == $value) {
                return ($key + 1);
            }
        }
        return null;
    }

    private function _getCardSetId($data)
    {
        $values = [
            'og',
            'loe',
            'core',
            'brm',
            'gvg',
            'tgt',
            'expert1',
            'naxx'
        ];
        foreach ($values as $key => $value) {
            if (strtolower($data) == $value) {
                return ($key + 1);
            }
        }
        return null;
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PlayClasses']
        ];
        $cards = $this->paginate($this->Cards);

        $this->set(compact('cards'));
        $this->set('_serialize', ['cards']);
    }

    /**
     * View method
     *
     * @param string|null $id Card id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $card = $this->Cards->get($id, [
            'contain' => ['PlayClasses', 'Decks']
        ]);

        $this->set('card', $card);
        $this->set('_serialize', ['card']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->viewBuilder()->template('form');

        $card = $this->Cards->newEntity();
        if ($this->request->is('post')) {
            $card = $this->Cards->patchEntity($card, $this->request->data);
            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The card could not be saved. Please, try again.'));
            }
        }
        $playClasses = $this->Cards->PlayClasses->find('list', ['limit' => 200]);
        $cardsSets = $this->Cards->CardsSets->find('list', ['limit' => 200]);
        $rarities = $this->Cards->Rarities->find('list', ['limit' => 200]);
        $cardsTypes = $this->Cards->cardsTypes->find('list', ['limit' => 200]);
        $cardsRaces = $this->Cards->cardsRaces->find('list', ['limit' => 200]);

        $this->set(compact('card', 'playClasses', 'cardsSets', 'rarities', 'cardsTypes', 'cardsRaces'));
        $this->set('_serialize', ['card']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Card id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->template('form');

        $card = $this->Cards->get($id, [
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $card = $this->Cards->patchEntity($card, $this->request->data);
            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The card could not be saved. Please, try again.'));
            }
        }
        $playClasses = $this->Cards->PlayClasses->find('list', ['limit' => 200]);
        $cardsSets = $this->Cards->CardsSets->find('list', ['limit' => 200]);
        $rarities = $this->Cards->Rarities->find('list', ['limit' => 200]);
        $cardsTypes = $this->Cards->cardsTypes->find('list', ['limit' => 200]);
        $cardsRaces = $this->Cards->cardsRaces->find('list', ['limit' => 200]);

        $this->set(compact('card', 'playClasses', 'cardsSets', 'rarities', 'cardsTypes', 'cardsRaces'));
        $this->set('_serialize', ['card']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Card id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $card = $this->Cards->get($id);
        if ($this->Cards->delete($card)) {
            $this->Flash->success(__('The card has been deleted.'));
        } else {
            $this->Flash->error(__('The card could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function cardPreview()
    {
        $card = $this->Cards->find('all', [
            'fields' => [
                'Cards.id',
                'Cards.name'
            ],
            'conditions' => [
                'Cards.id' => (int)$this->request->id
            ]
        ])
        ->first();

        $this->set(compact('card'));
        $this->set('_serialize', ['card']);
    }

    public function autocomplete()
    {
        $conditions = [];
        if ($this->request->query('term')) {
            $q = str_replace(' ', '%', $this->request->query('term'));
            $conditions[] = ['Cards.name LIKE' => '%'.$q.'%'];
        }

        $cards = $this->Cards->find('all', [
            'fields' => ['Cards.id', 'Cards.name'],
            'conditions' => $conditions,
            'limit' => 10
        ]);

        $this->set(compact('cards'));
        $this->set('_serialize', ['cards']);
    }

}
