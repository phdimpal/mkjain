<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterSectionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterSectionsTable Test Case
 */
class MasterSectionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterSectionsTable
     */
    public $MasterSections;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.master_sections',
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
        $config = TableRegistry::getTableLocator()->exists('MasterSections') ? [] : ['className' => MasterSectionsTable::class];
        $this->MasterSections = TableRegistry::getTableLocator()->get('MasterSections', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MasterSections);

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
