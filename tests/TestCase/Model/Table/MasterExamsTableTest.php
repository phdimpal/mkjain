<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterExamsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterExamsTable Test Case
 */
class MasterExamsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterExamsTable
     */
    public $MasterExams;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.master_exams',
        'app.classes',
        'app.sections',
        'app.subjects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MasterExams') ? [] : ['className' => MasterExamsTable::class];
        $this->MasterExams = TableRegistry::getTableLocator()->get('MasterExams', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MasterExams);

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
