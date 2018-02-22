<?php

use App\Models\PackagesLookup;
use App\Repositories\PackagesLookupRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PackagesLookupRepositoryTest extends TestCase
{
    use MakePackagesLookupTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PackagesLookupRepository
     */
    protected $packagesLookupRepo;

    public function setUp()
    {
        parent::setUp();
        $this->packagesLookupRepo = App::make(PackagesLookupRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePackagesLookup()
    {
        $packagesLookup = $this->fakePackagesLookupData();
        $createdPackagesLookup = $this->packagesLookupRepo->create($packagesLookup);
        $createdPackagesLookup = $createdPackagesLookup->toArray();
        $this->assertArrayHasKey('id', $createdPackagesLookup);
        $this->assertNotNull($createdPackagesLookup['id'], 'Created PackagesLookup must have id specified');
        $this->assertNotNull(PackagesLookup::find($createdPackagesLookup['id']), 'PackagesLookup with given id must be in DB');
        $this->assertModelData($packagesLookup, $createdPackagesLookup);
    }

    /**
     * @test read
     */
    public function testReadPackagesLookup()
    {
        $packagesLookup = $this->makePackagesLookup();
        $dbPackagesLookup = $this->packagesLookupRepo->find($packagesLookup->id);
        $dbPackagesLookup = $dbPackagesLookup->toArray();
        $this->assertModelData($packagesLookup->toArray(), $dbPackagesLookup);
    }

    /**
     * @test update
     */
    public function testUpdatePackagesLookup()
    {
        $packagesLookup = $this->makePackagesLookup();
        $fakePackagesLookup = $this->fakePackagesLookupData();
        $updatedPackagesLookup = $this->packagesLookupRepo->update($fakePackagesLookup, $packagesLookup->id);
        $this->assertModelData($fakePackagesLookup, $updatedPackagesLookup->toArray());
        $dbPackagesLookup = $this->packagesLookupRepo->find($packagesLookup->id);
        $this->assertModelData($fakePackagesLookup, $dbPackagesLookup->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePackagesLookup()
    {
        $packagesLookup = $this->makePackagesLookup();
        $resp = $this->packagesLookupRepo->delete($packagesLookup->id);
        $this->assertTrue($resp);
        $this->assertNull(PackagesLookup::find($packagesLookup->id), 'PackagesLookup should not exist in DB');
    }
}
