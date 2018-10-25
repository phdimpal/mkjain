<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterCategoriesTable Test Case
 */
class MasterCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterCategoriesTable
     */
    public $MasterCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.master_categories',
        'app.academic_calenders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MasterCategories') ? [] : ['className' => MasterCategoriesTable::class];
        $this->MasterCategories = TableRegistry::getTableLocator()->get('MasterCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MasterCategories);

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
