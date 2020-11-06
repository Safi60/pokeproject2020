<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Pokemons Controller
 *
 * @property \App\Model\Table\PokemonsTable $Pokemons
 * @method \App\Model\Entity\Pokemon[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PokemonsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $pokemons = $this->paginate($this->Pokemons);

        $this->set(compact('pokemons'));
    }

    /**
     * View method
     *
     * @param string|null $id Pokemon id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pokemon = $this->Pokemons->get($id, [
            'contain' => ['PokemonStats', 'PokemonTypes'],
        ]);

        $this->set(compact('pokemon'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pokemon = $this->Pokemons->newEmptyEntity();
        if ($this->request->is('post')) {
            $pokemon = $this->Pokemons->patchEntity($pokemon, $this->request->getData());
            if ($this->Pokemons->save($pokemon)) {
                $this->Flash->success(__('The pokemon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pokemon could not be saved. Please, try again.'));
        }
        $this->set(compact('pokemon'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pokemon id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pokemon = $this->Pokemons->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pokemon = $this->Pokemons->patchEntity($pokemon, $this->request->getData());
            if ($this->Pokemons->save($pokemon)) {
                $this->Flash->success(__('The pokemon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pokemon could not be saved. Please, try again.'));
        }
        $this->set(compact('pokemon'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pokemon id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pokemon = $this->Pokemons->get($id);
        if ($this->Pokemons->delete($pokemon)) {
            $this->Flash->success(__('The pokemon has been deleted.'));
        } else {
            $this->Flash->error(__('The pokemon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
