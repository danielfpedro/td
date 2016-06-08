<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DecksTypes Controller
 *
 * @property \App\Model\Table\DecksTypesTable $DecksTypes
 */
class DecksTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $decksTypes = $this->paginate($this->DecksTypes);

        $this->set(compact('decksTypes'));
        $this->set('_serialize', ['decksTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Decks Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $decksType = $this->DecksTypes->get($id, [
            'contain' => ['Decks']
        ]);

        $this->set('decksType', $decksType);
        $this->set('_serialize', ['decksType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $decksType = $this->DecksTypes->newEntity();
        if ($this->request->is('post')) {
            $decksType = $this->DecksTypes->patchEntity($decksType, $this->request->data);
            if ($this->DecksTypes->save($decksType)) {
                $this->Flash->success(__('The decks type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The decks type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('decksType'));
        $this->set('_serialize', ['decksType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Decks Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $decksType = $this->DecksTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $decksType = $this->DecksTypes->patchEntity($decksType, $this->request->data);
            if ($this->DecksTypes->save($decksType)) {
                $this->Flash->success(__('The decks type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The decks type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('decksType'));
        $this->set('_serialize', ['decksType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Decks Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $decksType = $this->DecksTypes->get($id);
        if ($this->DecksTypes->delete($decksType)) {
            $this->Flash->success(__('The decks type has been deleted.'));
        } else {
            $this->Flash->error(__('The decks type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
