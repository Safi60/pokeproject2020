<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatsTable Test Case
 */
class StatsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StatsTable
     */
    protected $Stats;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Stats',
        'app.PokemonStats',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Stats') ? [] : ['className' => StatsTable::class];
        $this->Stats = $this->getTableLocator()->get('Stats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Stats);

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
