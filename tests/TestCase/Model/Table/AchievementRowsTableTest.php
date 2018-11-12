<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AchievementRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AchievementRowsTable Test Case
 */
class AchievementRowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AchievementRowsTable
     */
    public $AchievementRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.achievement_rows',
        'app.achievements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AchievementRows') ? [] : ['className' => AchievementRowsTable::class];
        $this->AchievementRows = TableRegistry::getTableLocator()->get('AchievementRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AchievementRows);

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
