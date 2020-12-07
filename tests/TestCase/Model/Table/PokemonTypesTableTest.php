<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PokemonTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PokemonTypesTable Test Case
 */
class PokemonTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PokemonTypesTable
     */
    protected $PokemonTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PokemonTypes',
        'app.Pokemons',
        'app.Types',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PokemonTypes') ? [] : ['className' => PokemonTypesTable::class];
        $this->PokemonTypes = $this->getTableLocator()->get('PokemonTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PokemonTypes);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
