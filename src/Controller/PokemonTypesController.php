<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PokemonTypes Controller
 *
 * @property \App\Model\Table\PokemonTypesTable $PokemonTypes
 * @method \App\Model\Entity\PokemonType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PokemonTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pokemon', 'Types'],
        ];
        $pokemonTypes = $this->paginate($this->PokemonTypes);

        $this->set(compact('pokemonTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Pokemon Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pokemonType = $this->PokemonTypes->get($id, [
            'contain' => ['Pokemon', 'Types'],
        ]);

        $this->set(compact('pokemonType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pokemonType = $this->PokemonTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $pokemonType = $this->PokemonTypes->patchEntity($pokemonType, $this->request->getData());
            if ($this->PokemonTypes->save($pokemonType)) {
                $this->Flash->success(__('The pokemon type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pokemon type could not be saved. Please, try again.'));
        }
        $pokemon = $this->PokemonTypes->Pokemon->find('list', ['limit' => 200]);
        $types = $this->PokemonTypes->Types->find('list', ['limit' => 200]);
        $this->set(compact('pokemonType', 'pokemon', 'types'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pokemon Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pokemonType = $this->PokemonTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pokemonType = $this->PokemonTypes->patchEntity($pokemonType, $this->request->getData());
            if ($this->PokemonTypes->save($pokemonType)) {
                $this->Flash->success(__('The pokemon type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pokemon type could not be saved. Please, try again.'));
        }
        $pokemon = $this->PokemonTypes->Pokemon->find('list', ['limit' => 200]);
        $types = $this->PokemonTypes->Types->find('list', ['limit' => 200]);
        $this->set(compact('pokemonType', 'pokemon', 'types'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pokemon Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pokemonType = $this->PokemonTypes->get($id);
        if ($this->PokemonTypes->delete($pokemonType)) {
            $this->Flash->success(__('The pokemon type has been deleted.'));
        } else {
            $this->Flash->error(__('The pokemon type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
