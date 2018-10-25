<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterClassesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterClassesTable Test Case
 */
class MasterClassesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterClassesTable
     */
    public $MasterClasses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.master_classes',
        'app.registrations',
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
        $config = TableRegistry::getTableLocator()->exists('MasterClasses') ? [] : ['className' => MasterClassesTable::class];
        $this->MasterClasses = TableRegistry::getTableLocator()->get('MasterClasses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MasterClasses);

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
