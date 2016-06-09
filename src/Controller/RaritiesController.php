<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rarities Controller
 *
 * @property \App\Model\Table\RaritiesTable $Rarities
 */
class RaritiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $rarities = $this->paginate($this->Rarities);

        $this->set(compact('rarities'));
        $this->set('_serialize', ['rarities']);
    }

    /**
     * View method
     *
     * @param string|null $id Rarity id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rarity = $this->Rarities->get($id, [
            'contain' => ['Cards']
        ]);

        $this->set('rarity', $rarity);
        $this->set('_serialize', ['rarity']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rarity = $this->Rarities->newEntity();
        if ($this->request->is('post')) {
            $rarity = $this->Rarities->patchEntity($rarity, $this->request->data);
            if ($this->Rarities->save($rarity)) {
                $this->Flash->success(__('The rarity has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rarity could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('rarity'));
        $this->set('_serialize', ['rarity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rarity id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rarity = $this->Rarities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rarity = $this->Rarities->patchEntity($rarity, $this->request->data);
            if ($this->Rarities->save($rarity)) {
                $this->Flash->success(__('The rarity has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rarity could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('rarity'));
        $this->set('_serialize', ['rarity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rarity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rarity = $this->Rarities->get($id);
        if ($this->Rarities->delete($rarity)) {
            $this->Flash->success(__('The rarity has been deleted.'));
        } else {
            $this->Flash->error(__('The rarity could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
