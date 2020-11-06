<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PokemonStatsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PokemonStatsTable Test Case
 */
class PokemonStatsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PokemonStatsTable
     */
    protected $PokemonStats;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PokemonStats',
        'app.Pokemon',
        'app.Stats',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PokemonStats') ? [] : ['className' => PokemonStatsTable::class];
        $this->PokemonStats = $this->getTableLocator()->get('PokemonStats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PokemonStats);

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
