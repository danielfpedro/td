<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cards Controller
 *
 * @property \App\Model\Table\CardsTable $Cards
 */
class CardsController extends AppController
{

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
}
