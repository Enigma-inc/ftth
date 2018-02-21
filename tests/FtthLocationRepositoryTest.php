<?php

use App\Models\FtthLocation;
use App\Repositories\FtthLocationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FtthLocationRepositoryTest extends TestCase
{
    use MakeFtthLocationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FtthLocationRepository
     */
    protected $ftthLocationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ftthLocationRepo = App::make(FtthLocationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFtthLocation()
    {
        $ftthLocation = $this->fakeFtthLocationData();
        $createdFtthLocation = $this->ftthLocationRepo->create($ftthLocation);
        $createdFtthLocation = $createdFtthLocation->toArray();
        $this->assertArrayHasKey('id', $createdFtthLocation);
        $this->assertNotNull($createdFtthLocation['id'], 'Created FtthLocation must have id specified');
        $this->assertNotNull(FtthLocation::find($createdFtthLocation['id']), 'FtthLocation with given id must be in DB');
        $this->assertModelData($ftthLocation, $createdFtthLocation);
    }

    /**
     * @test read
     */
    public function testReadFtthLocation()
    {
        $ftthLocation = $this->makeFtthLocation();
        $dbFtthLocation = $this->ftthLocationRepo->find($ftthLocation->id);
        $dbFtthLocation = $dbFtthLocation->toArray();
        $this->assertModelData($ftthLocation->toArray(), $dbFtthLocation);
    }

    /**
     * @test update
     */
    public function testUpdateFtthLocation()
    {
        $ftthLocation = $this->makeFtthLocation();
        $fakeFtthLocation = $this->fakeFtthLocationData();
        $updatedFtthLocation = $this->ftthLocationRepo->update($fakeFtthLocation, $ftthLocation->id);
        $this->assertModelData($fakeFtthLocation, $updatedFtthLocation->toArray());
        $dbFtthLocation = $this->ftthLocationRepo->find($ftthLocation->id);
        $this->assertModelData($fakeFtthLocation, $dbFtthLocation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFtthLocation()
    {
        $ftthLocation = $this->makeFtthLocation();
        $resp = $this->ftthLocationRepo->delete($ftthLocation->id);
        $this->assertTrue($resp);
        $this->assertNull(FtthLocation::find($ftthLocation->id), 'FtthLocation should not exist in DB');
    }
}
