<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterYearsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterYearsTable Test Case
 */
class MasterYearsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterYearsTable
     */
    public $MasterYears;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.master_years'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MasterYears') ? [] : ['className' => MasterYearsTable::class];
        $this->MasterYears = TableRegistry::getTableLocator()->get('MasterYears', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MasterYears);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
