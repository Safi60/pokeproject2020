<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PokemonStats Controller
 *
 * @property \App\Model\Table\PokemonStatsTable $PokemonStats
 * @method \App\Model\Entity\PokemonStat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PokemonStatsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pokemons', 'Stats'],
        ];
        $pokemonStats = $this->paginate($this->PokemonStats);

        $this->set(compact('pokemonStats'));
    }

    /**
     * View method
     *
     * @param string|null $id Pokemon Stat id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pokemonStat = $this->PokemonStats->get($id, [
            'contain' => ['Pokemons', 'Stats'],
        ]);

        $this->set(compact('pokemonStat'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pokemonStat = $this->PokemonStats->newEmptyEntity();
        if ($this->request->is('post')) {
            $pokemonStat = $this->PokemonStats->patchEntity($pokemonStat, $this->request->getData());
            if ($this->PokemonStats->save($pokemonStat)) {
                $this->Flash->success(__('The pokemon stat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pokemon stat could not be saved. Please, try again.'));
        }
        $pokemon = $this->PokemonStats->Pokemons->find('list', ['limit' => 200]);
        $stats = $this->PokemonStats->Stats->find('list', ['limit' => 200]);
        $this->set(compact('pokemonStat', 'pokemon', 'stats'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pokemon Stat id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pokemonStat = $this->PokemonStats->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pokemonStat = $this->PokemonStats->patchEntity($pokemonStat, $this->request->getData());
            if ($this->PokemonStats->save($pokemonStat)) {
                $this->Flash->success(__('The pokemon stat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pokemon stat could not be saved. Please, try again.'));
        }
        $pokemon = $this->PokemonStats->Pokemons->find('list', ['limit' => 200]);
        $stats = $this->PokemonStats->Stats->find('list', ['limit' => 200]);
        $this->set(compact('pokemonStat', 'pokemon', 'stats'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pokemon Stat id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pokemonStat = $this->PokemonStats->get($id);
        if ($this->PokemonStats->delete($pokemonStat)) {
            $this->Flash->success(__('The pokemon stat has been deleted.'));
        } else {
            $this->Flash->error(__('The pokemon stat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
