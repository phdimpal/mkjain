<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClassSectionMappingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClassSectionMappingsTable Test Case
 */
class ClassSectionMappingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClassSectionMappingsTable
     */
    public $ClassSectionMappings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.class_section_mappings',
        'app.master_classes',
        'app.master_sections',
        'app.master_subjects',
        'app.master_media'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ClassSectionMappings') ? [] : ['className' => ClassSectionMappingsTable::class];
        $this->ClassSectionMappings = TableRegistry::getTableLocator()->get('ClassSectionMappings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClassSectionMappings);

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
