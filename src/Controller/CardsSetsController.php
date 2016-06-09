<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CardsSets Controller
 *
 * @property \App\Model\Table\CardsSetsTable $CardsSets
 */
class CardsSetsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $cardsSets = $this->paginate($this->CardsSets);

        $this->set(compact('cardsSets'));
        $this->set('_serialize', ['cardsSets']);
    }

    /**
     * View method
     *
     * @param string|null $id Cards Set id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cardsSet = $this->CardsSets->get($id, [
            'contain' => ['Cards']
        ]);

        $this->set('cardsSet', $cardsSet);
        $this->set('_serialize', ['cardsSet']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cardsSet = $this->CardsSets->newEntity();
        if ($this->request->is('post')) {
            $cardsSet = $this->CardsSets->patchEntity($cardsSet, $this->request->data);
            if ($this->CardsSets->save($cardsSet)) {
                $this->Flash->success(__('The cards set has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cards set could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cardsSet'));
        $this->set('_serialize', ['cardsSet']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cards Set id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cardsSet = $this->CardsSets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cardsSet = $this->CardsSets->patchEntity($cardsSet, $this->request->data);
            if ($this->CardsSets->save($cardsSet)) {
                $this->Flash->success(__('The cards set has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cards set could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cardsSet'));
        $this->set('_serialize', ['cardsSet']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cards Set id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cardsSet = $this->CardsSets->get($id);
        if ($this->CardsSets->delete($cardsSet)) {
            $this->Flash->success(__('The cards set has been deleted.'));
        } else {
            $this->Flash->error(__('The cards set could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
