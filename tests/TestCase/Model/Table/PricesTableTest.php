<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PricesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PricesTable Test Case
 */
class PricesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PricesTable
     */
    protected $Prices;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Prices',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Prices') ? [] : ['className' => PricesTable::class];
        $this->Prices = $this->getTableLocator()->get('Prices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Prices);

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
