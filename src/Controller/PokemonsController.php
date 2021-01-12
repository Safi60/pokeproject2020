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
        $this->paginate = [
            'limit' => 30,
        ];

        $pokemons = $this->Pokemons->find('all')->contain(['PokemonStats.Stats', 'PokemonTypes.Types']);
        $pokemons = $this->paginate($pokemons);

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
            'contain' => ['PokemonStats.Stats', 'PokemonTypes.Types'],
        ]);

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
/**
     * Delete method
     *
     * @param string|null $id Pokemon id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function dashboard()
    {
// Doc: https://book.cakephp.org/3/fr/orm/query-builder.html

//  Poids moyen des pokemons de la 4ième génération:

        $moy_quatrieme_gene = $this->Pokemons->find();
        $moy_quatrieme_gene  ->select(["avgWeight"=>"AVG(Weight)"])
                             ->where(function ($q2) {
                             return $q2->between('pokedex_number', 387, 493); 
                        });




        $nombre_de_fee = $this->Pokemons->find(); 
        $nombre_de_fee  ->select(["countFairies"=>"COUNT(Pokemons.id)"])
                        ->matching('PokemonTypes.Types', function ($q3)
                         {
                           return $q3->where(['Types.name' => 'fairy']); 
                         })
                                     ->where(function ($q3) {

                                            return $q3
                                                    ->or(function($or){ 
                                                        return $or
                                                            ->between('pokedex_number', 1, 151) 
                                                            ->between('pokedex_number', 252, 386) 
                                                            ->between('pokedex_number', 722, 796); 
                                                    });

                                        });

                                        
// Les 10 premiers pokemons qui possèdent la plus grande vitesse:

        $les_plus_rapides = $this->Pokemons->find();
        $les_plus_rapides ->select(['name','PokemonStats.value'])
                          ->matching('PokemonStats.Stats', function ($q) { 
                          return $q->where(['Stats.name' => 'speed']);
                 })
                 ->order(['PokemonStats.value' => 'DESC'])
                 ->limit(10);





        $query=array(
            "les_plus_rapides"=>$les_plus_rapides,
            "moy_quatrieme_gene"=>$moy_quatrieme_gene,
            "nombre_de_fee"=>$nombre_de_fee
        );



        $this->set(compact('query')); 
    }

}
