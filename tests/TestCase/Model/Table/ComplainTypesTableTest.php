<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComplainTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComplainTypesTable Test Case
 */
class ComplainTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ComplainTypesTable
     */
    public $ComplainTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.complain_types',
        'app.complains'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ComplainTypes') ? [] : ['className' => ComplainTypesTable::class];
        $this->ComplainTypes = TableRegistry::getTableLocator()->get('ComplainTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ComplainTypes);

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
