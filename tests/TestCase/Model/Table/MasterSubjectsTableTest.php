<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterSubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterSubjectsTable Test Case
 */
class MasterSubjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterSubjectsTable
     */
    public $MasterSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.master_subjects',
        'app.syllabuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MasterSubjects') ? [] : ['className' => MasterSubjectsTable::class];
        $this->MasterSubjects = TableRegistry::getTableLocator()->get('MasterSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MasterSubjects);

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
