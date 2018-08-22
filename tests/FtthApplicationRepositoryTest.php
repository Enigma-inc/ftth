<?php

use App\Models\FtthApplication;
use App\Repositories\FtthApplicationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FtthApplicationRepositoryTest extends TestCase
{
    use MakeFtthApplicationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FtthApplicationRepository
     */
    protected $ftthApplicationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ftthApplicationRepo = App::make(FtthApplicationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFtthApplication()
    {
        $ftthApplication = $this->fakeFtthApplicationData();
        $createdFtthApplication = $this->ftthApplicationRepo->create($ftthApplication);
        $createdFtthApplication = $createdFtthApplication->toArray();
        $this->assertArrayHasKey('id', $createdFtthApplication);
        $this->assertNotNull($createdFtthApplication['id'], 'Created FtthApplication must have id specified');
        $this->assertNotNull(FtthApplication::find($createdFtthApplication['id']), 'FtthApplication with given id must be in DB');
        $this->assertModelData($ftthApplication, $createdFtthApplication);
    }

    /**
     * @test read
     */
    public function testReadFtthApplication()
    {
        $ftthApplication = $this->makeFtthApplication();
        $dbFtthApplication = $this->ftthApplicationRepo->find($ftthApplication->id);
        $dbFtthApplication = $dbFtthApplication->toArray();
        $this->assertModelData($ftthApplication->toArray(), $dbFtthApplication);
    }

    /**
     * @test update
     */
    public function testUpdateFtthApplication()
    {
        $ftthApplication = $this->makeFtthApplication();
        $fakeFtthApplication = $this->fakeFtthApplicationData();
        $updatedFtthApplication = $this->ftthApplicationRepo->update($fakeFtthApplication, $ftthApplication->id);
        $this->assertModelData($fakeFtthApplication, $updatedFtthApplication->toArray());
        $dbFtthApplication = $this->ftthApplicationRepo->find($ftthApplication->id);
        $this->assertModelData($fakeFtthApplication, $dbFtthApplication->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFtthApplication()
    {
        $ftthApplication = $this->makeFtthApplication();
        $resp = $this->ftthApplicationRepo->delete($ftthApplication->id);
        $this->assertTrue($resp);
        $this->assertNull(FtthApplication::find($ftthApplication->id), 'FtthApplication should not exist in DB');
    }
}
