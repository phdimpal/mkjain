<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssignmentRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssignmentRowsTable Test Case
 */
class AssignmentRowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AssignmentRowsTable
     */
    public $AssignmentRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.assignment_rows',
        'app.registrations',
        'app.assignments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AssignmentRows') ? [] : ['className' => AssignmentRowsTable::class];
        $this->AssignmentRows = TableRegistry::getTableLocator()->get('AssignmentRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AssignmentRows);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
