<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PackagesLookupApiTest extends TestCase
{
    use MakePackagesLookupTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePackagesLookup()
    {
        $packagesLookup = $this->fakePackagesLookupData();
        $this->json('POST', '/api/v1/packagesLookups', $packagesLookup);

        $this->assertApiResponse($packagesLookup);
    }

    /**
     * @test
     */
    public function testReadPackagesLookup()
    {
        $packagesLookup = $this->makePackagesLookup();
        $this->json('GET', '/api/v1/packagesLookups/'.$packagesLookup->id);

        $this->assertApiResponse($packagesLookup->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePackagesLookup()
    {
        $packagesLookup = $this->makePackagesLookup();
        $editedPackagesLookup = $this->fakePackagesLookupData();

        $this->json('PUT', '/api/v1/packagesLookups/'.$packagesLookup->id, $editedPackagesLookup);

        $this->assertApiResponse($editedPackagesLookup);
    }

    /**
     * @test
     */
    public function testDeletePackagesLookup()
    {
        $packagesLookup = $this->makePackagesLookup();
        $this->json('DELETE', '/api/v1/packagesLookups/'.$packagesLookup->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/packagesLookups/'.$packagesLookup->id);

        $this->assertResponseStatus(404);
    }
}
