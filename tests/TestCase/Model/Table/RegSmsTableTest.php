<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegSmsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegSmsTable Test Case
 */
class RegSmsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RegSmsTable
     */
    public $RegSms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reg_sms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RegSms') ? [] : ['className' => RegSmsTable::class];
        $this->RegSms = TableRegistry::getTableLocator()->get('RegSms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RegSms);

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
