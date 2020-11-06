<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PokemonsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PokemonsTable Test Case
 */
class PokemonsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PokemonsTable
     */
    protected $Pokemons;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Pokemons',
        'app.PokemonStats',
        'app.PokemonTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pokemons') ? [] : ['className' => PokemonsTable::class];
        $this->Pokemons = $this->getTableLocator()->get('Pokemons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Pokemons);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
