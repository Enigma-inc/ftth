<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FtthLocationApiTest extends TestCase
{
    use MakeFtthLocationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFtthLocation()
    {
        $ftthLocation = $this->fakeFtthLocationData();
        $this->json('POST', '/api/v1/ftthLocations', $ftthLocation);

        $this->assertApiResponse($ftthLocation);
    }

    /**
     * @test
     */
    public function testReadFtthLocation()
    {
        $ftthLocation = $this->makeFtthLocation();
        $this->json('GET', '/api/v1/ftthLocations/'.$ftthLocation->id);

        $this->assertApiResponse($ftthLocation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFtthLocation()
    {
        $ftthLocation = $this->makeFtthLocation();
        $editedFtthLocation = $this->fakeFtthLocationData();

        $this->json('PUT', '/api/v1/ftthLocations/'.$ftthLocation->id, $editedFtthLocation);

        $this->assertApiResponse($editedFtthLocation);
    }

    /**
     * @test
     */
    public function testDeleteFtthLocation()
    {
        $ftthLocation = $this->makeFtthLocation();
        $this->json('DELETE', '/api/v1/ftthLocations/'.$ftthLocation->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ftthLocations/'.$ftthLocation->id);

        $this->assertResponseStatus(404);
    }
}
