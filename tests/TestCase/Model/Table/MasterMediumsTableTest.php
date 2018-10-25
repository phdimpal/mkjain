<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterMediumsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterMediumsTable Test Case
 */
class MasterMediumsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterMediumsTable
     */
    public $MasterMediums;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.master_mediums',
        'app.registrations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MasterMediums') ? [] : ['className' => MasterMediumsTable::class];
        $this->MasterMediums = TableRegistry::getTableLocator()->get('MasterMediums', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MasterMediums);

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
