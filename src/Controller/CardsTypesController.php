<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CardsTypes Controller
 *
 * @property \App\Model\Table\CardsTypesTable $CardsTypes
 */
class CardsTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $cardsTypes = $this->paginate($this->CardsTypes);

        $this->set(compact('cardsTypes'));
        $this->set('_serialize', ['cardsTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Cards Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cardsType = $this->CardsTypes->get($id, [
            'contain' => ['Cards']
        ]);

        $this->set('cardsType', $cardsType);
        $this->set('_serialize', ['cardsType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cardsType = $this->CardsTypes->newEntity();
        if ($this->request->is('post')) {
            $cardsType = $this->CardsTypes->patchEntity($cardsType, $this->request->data);
            if ($this->CardsTypes->save($cardsType)) {
                $this->Flash->success(__('The cards type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cards type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cardsType'));
        $this->set('_serialize', ['cardsType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cards Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cardsType = $this->CardsTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cardsType = $this->CardsTypes->patchEntity($cardsType, $this->request->data);
            if ($this->CardsTypes->save($cardsType)) {
                $this->Flash->success(__('The cards type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cards type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cardsType'));
        $this->set('_serialize', ['cardsType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cards Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cardsType = $this->CardsTypes->get($id);
        if ($this->CardsTypes->delete($cardsType)) {
            $this->Flash->success(__('The cards type has been deleted.'));
        } else {
            $this->Flash->error(__('The cards type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
