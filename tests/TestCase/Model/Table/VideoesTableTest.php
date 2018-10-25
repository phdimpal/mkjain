<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VideoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VideoesTable Test Case
 */
class VideoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VideoesTable
     */
    public $Videoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.videoes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Videoes') ? [] : ['className' => VideoesTable::class];
        $this->Videoes = TableRegistry::getTableLocator()->get('Videoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Videoes);

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
