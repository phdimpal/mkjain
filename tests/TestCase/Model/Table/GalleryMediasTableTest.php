<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GalleryMediasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GalleryMediasTable Test Case
 */
class GalleryMediasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GalleryMediasTable
     */
    public $GalleryMedias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gallery_medias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GalleryMedias') ? [] : ['className' => GalleryMediasTable::class];
        $this->GalleryMedias = TableRegistry::getTableLocator()->get('GalleryMedias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GalleryMedias);

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
