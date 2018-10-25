<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttendanceRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttendanceRowsTable Test Case
 */
class AttendanceRowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttendanceRowsTable
     */
    public $AttendanceRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attendance_rows',
        'app.attendances',
        'app.students'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AttendanceRows') ? [] : ['className' => AttendanceRowsTable::class];
        $this->AttendanceRows = TableRegistry::getTableLocator()->get('AttendanceRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttendanceRows);

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
