<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Stats Controller
 *
 * @property \App\Model\Table\StatsTable $Stats
 * @method \App\Model\Entity\Stat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StatsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $stats = $this->paginate($this->Stats);

        $this->set(compact('stats'));
    }

    /**
     * View method
     *
     * @param string|null $id Stat id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stat = $this->Stats->get($id, [
            'contain' => ['PokemonStats'],
        ]);

        $this->set(compact('stat'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stat = $this->Stats->newEmptyEntity();
        if ($this->request->is('post')) {
            $stat = $this->Stats->patchEntity($stat, $this->request->getData());
            if ($this->Stats->save($stat)) {
                $this->Flash->success(__('The stat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stat could not be saved. Please, try again.'));
        }
        $this->set(compact('stat'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stat id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stat = $this->Stats->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stat = $this->Stats->patchEntity($stat, $this->request->getData());
            if ($this->Stats->save($stat)) {
                $this->Flash->success(__('The stat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stat could not be saved. Please, try again.'));
        }
        $this->set(compact('stat'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stat id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stat = $this->Stats->get($id);
        if ($this->Stats->delete($stat)) {
            $this->Flash->success(__('The stat has been deleted.'));
        } else {
            $this->Flash->error(__('The stat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
