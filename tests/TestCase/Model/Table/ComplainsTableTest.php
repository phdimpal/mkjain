<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComplainsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComplainsTable Test Case
 */
class ComplainsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ComplainsTable
     */
    public $Complains;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.complains',
        'app.complain_types',
        'app.emails',
        'app.master_classes',
        'app.master_sections',
        'app.master_roles',
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
        $config = TableRegistry::getTableLocator()->exists('Complains') ? [] : ['className' => ComplainsTable::class];
        $this->Complains = TableRegistry::getTableLocator()->get('Complains', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Complains);

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
