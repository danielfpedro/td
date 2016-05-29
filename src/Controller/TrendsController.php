<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Trends Controller
 *
 * @property \App\Model\Table\TrendsTable $Trends
 */
class TrendsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Posts']
        ];
        $trends = $this->paginate($this->Trends);

        $this->set(compact('trends'));
        $this->set('_serialize', ['trends']);
    }

    /**
     * View method
     *
     * @param string|null $id Trend id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trend = $this->Trends->get($id, [
            'contain' => ['Posts']
        ]);

        $this->set('trend', $trend);
        $this->set('_serialize', ['trend']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trend = $this->Trends->newEntity();
        if ($this->request->is('post')) {
            $trend = $this->Trends->patchEntity($trend, $this->request->data);
            if ($this->Trends->save($trend)) {
                $this->Flash->success(__('The trend has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trend could not be saved. Please, try again.'));
            }
        }
        $posts = $this->Trends->Posts->find('list', ['limit' => 200]);
        $this->set(compact('trend', 'posts'));
        $this->set('_serialize', ['trend']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trend id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trend = $this->Trends->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trend = $this->Trends->patchEntity($trend, $this->request->data);
            if ($this->Trends->save($trend)) {
                $this->Flash->success(__('The trend has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trend could not be saved. Please, try again.'));
            }
        }
        $posts = $this->Trends->Posts->find('list', ['limit' => 200]);
        $this->set(compact('trend', 'posts'));
        $this->set('_serialize', ['trend']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trend id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trend = $this->Trends->get($id);
        if ($this->Trends->delete($trend)) {
            $this->Flash->success(__('The trend has been deleted.'));
        } else {
            $this->Flash->error(__('The trend could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
