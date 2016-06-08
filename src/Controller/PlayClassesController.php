<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PlayClasses Controller
 *
 * @property \App\Model\Table\PlayClassesTable $PlayClasses
 */
class PlayClassesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $playClasses = $this->paginate($this->PlayClasses);

        $this->set(compact('playClasses'));
        $this->set('_serialize', ['playClasses']);
    }

    /**
     * View method
     *
     * @param string|null $id Play Class id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $playClass = $this->PlayClasses->get($id, [
            'contain' => ['Decks']
        ]);

        $this->set('playClass', $playClass);
        $this->set('_serialize', ['playClass']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $playClass = $this->PlayClasses->newEntity();
        if ($this->request->is('post')) {
            $playClass = $this->PlayClasses->patchEntity($playClass, $this->request->data);
            if ($this->PlayClasses->save($playClass)) {
                $this->Flash->success(__('The play class has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The play class could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('playClass'));
        $this->set('_serialize', ['playClass']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Play Class id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $playClass = $this->PlayClasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $playClass = $this->PlayClasses->patchEntity($playClass, $this->request->data);
            if ($this->PlayClasses->save($playClass)) {
                $this->Flash->success(__('The play class has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The play class could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('playClass'));
        $this->set('_serialize', ['playClass']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Play Class id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $playClass = $this->PlayClasses->get($id);
        if ($this->PlayClasses->delete($playClass)) {
            $this->Flash->success(__('The play class has been deleted.'));
        } else {
            $this->Flash->error(__('The play class could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
