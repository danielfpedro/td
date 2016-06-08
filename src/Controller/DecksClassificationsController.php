<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DecksClassifications Controller
 *
 * @property \App\Model\Table\DecksClassificationsTable $DecksClassifications
 */
class DecksClassificationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $decksClassifications = $this->paginate($this->DecksClassifications);

        $this->set(compact('decksClassifications'));
        $this->set('_serialize', ['decksClassifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Decks Classification id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $decksClassification = $this->DecksClassifications->get($id, [
            'contain' => ['Decks']
        ]);

        $this->set('decksClassification', $decksClassification);
        $this->set('_serialize', ['decksClassification']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $decksClassification = $this->DecksClassifications->newEntity();
        if ($this->request->is('post')) {
            $decksClassification = $this->DecksClassifications->patchEntity($decksClassification, $this->request->data);
            if ($this->DecksClassifications->save($decksClassification)) {
                $this->Flash->success(__('The decks classification has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The decks classification could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('decksClassification'));
        $this->set('_serialize', ['decksClassification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Decks Classification id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $decksClassification = $this->DecksClassifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $decksClassification = $this->DecksClassifications->patchEntity($decksClassification, $this->request->data);
            if ($this->DecksClassifications->save($decksClassification)) {
                $this->Flash->success(__('The decks classification has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The decks classification could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('decksClassification'));
        $this->set('_serialize', ['decksClassification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Decks Classification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $decksClassification = $this->DecksClassifications->get($id);
        if ($this->DecksClassifications->delete($decksClassification)) {
            $this->Flash->success(__('The decks classification has been deleted.'));
        } else {
            $this->Flash->error(__('The decks classification could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
