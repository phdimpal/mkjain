<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GalleryRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GalleryRowsTable Test Case
 */
class GalleryRowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GalleryRowsTable
     */
    public $GalleryRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gallery_rows',
        'app.galleries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GalleryRows') ? [] : ['className' => GalleryRowsTable::class];
        $this->GalleryRows = TableRegistry::getTableLocator()->get('GalleryRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GalleryRows);

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
