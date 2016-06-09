<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DecksCards Controller
 *
 * @property \App\Model\Table\DecksCardsTable $DecksCards
 */
class DecksCardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Decks', 'Cards']
        ];
        $decksCards = $this->paginate($this->DecksCards);

        $this->set(compact('decksCards'));
        $this->set('_serialize', ['decksCards']);
    }

    /**
     * View method
     *
     * @param string|null $id Decks Card id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $decksCard = $this->DecksCards->get($id, [
            'contain' => ['Decks', 'Cards']
        ]);

        $this->set('decksCard', $decksCard);
        $this->set('_serialize', ['decksCard']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $decksCard = $this->DecksCards->newEntity();
        if ($this->request->is('post')) {
            $decksCard = $this->DecksCards->patchEntity($decksCard, $this->request->data);
            if ($this->DecksCards->save($decksCard)) {
                $this->Flash->success(__('The decks card has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The decks card could not be saved. Please, try again.'));
            }
        }
        $decks = $this->DecksCards->Decks->find('list', ['limit' => 200]);
        $cards = $this->DecksCards->Cards->find('list', ['limit' => 200]);
        $this->set(compact('decksCard', 'decks', 'cards'));
        $this->set('_serialize', ['decksCard']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Decks Card id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $decksCard = $this->DecksCards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $decksCard = $this->DecksCards->patchEntity($decksCard, $this->request->data);
            if ($this->DecksCards->save($decksCard)) {
                $this->Flash->success(__('The decks card has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The decks card could not be saved. Please, try again.'));
            }
        }
        $decks = $this->DecksCards->Decks->find('list', ['limit' => 200]);
        $cards = $this->DecksCards->Cards->find('list', ['limit' => 200]);
        $this->set(compact('decksCard', 'decks', 'cards'));
        $this->set('_serialize', ['decksCard']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Decks Card id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $decksCard = $this->DecksCards->get($id);
        if ($this->DecksCards->delete($decksCard)) {
            $this->Flash->success(__('The decks card has been deleted.'));
        } else {
            $this->Flash->error(__('The decks card could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
