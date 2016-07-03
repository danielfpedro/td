<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CardsRaces Controller
 *
 * @property \App\Model\Table\CardsRacesTable $CardsRaces
 */
class CardsRacesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $cardsRaces = $this->paginate($this->CardsRaces);

        $this->set(compact('cardsRaces'));
        $this->set('_serialize', ['cardsRaces']);
    }

    /**
     * View method
     *
     * @param string|null $id Cards Race id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cardsRace = $this->CardsRaces->get($id, [
            'contain' => ['Cards']
        ]);

        $this->set('cardsRace', $cardsRace);
        $this->set('_serialize', ['cardsRace']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cardsRace = $this->CardsRaces->newEntity();
        if ($this->request->is('post')) {
            $cardsRace = $this->CardsRaces->patchEntity($cardsRace, $this->request->data);
            if ($this->CardsRaces->save($cardsRace)) {
                $this->Flash->success(__('The cards race has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cards race could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cardsRace'));
        $this->set('_serialize', ['cardsRace']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cards Race id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cardsRace = $this->CardsRaces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cardsRace = $this->CardsRaces->patchEntity($cardsRace, $this->request->data);
            if ($this->CardsRaces->save($cardsRace)) {
                $this->Flash->success(__('The cards race has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cards race could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cardsRace'));
        $this->set('_serialize', ['cardsRace']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cards Race id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cardsRace = $this->CardsRaces->get($id);
        if ($this->CardsRaces->delete($cardsRace)) {
            $this->Flash->success(__('The cards race has been deleted.'));
        } else {
            $this->Flash->error(__('The cards race could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
