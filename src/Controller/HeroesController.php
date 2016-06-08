<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Heroes Controller
 *
 * @property \App\Model\Table\HeroesTable $Heroes
 */
class HeroesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $heroes = $this->paginate($this->Heroes);

        $this->set(compact('heroes'));
        $this->set('_serialize', ['heroes']);
    }

    /**
     * View method
     *
     * @param string|null $id Hero id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hero = $this->Heroes->get($id, [
            'contain' => ['Decks']
        ]);

        $this->set('hero', $hero);
        $this->set('_serialize', ['hero']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hero = $this->Heroes->newEntity();
        if ($this->request->is('post')) {
            $hero = $this->Heroes->patchEntity($hero, $this->request->data);
            if ($this->Heroes->save($hero)) {
                $this->Flash->success(__('The hero has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hero could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('hero'));
        $this->set('_serialize', ['hero']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hero id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hero = $this->Heroes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hero = $this->Heroes->patchEntity($hero, $this->request->data);
            if ($this->Heroes->save($hero)) {
                $this->Flash->success(__('The hero has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hero could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('hero'));
        $this->set('_serialize', ['hero']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hero id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hero = $this->Heroes->get($id);
        if ($this->Heroes->delete($hero)) {
            $this->Flash->success(__('The hero has been deleted.'));
        } else {
            $this->Flash->error(__('The hero could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
