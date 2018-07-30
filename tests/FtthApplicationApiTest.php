<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FtthApplicationApiTest extends TestCase
{
    use MakeFtthApplicationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFtthApplication()
    {
        $ftthApplication = $this->fakeFtthApplicationData();
        $this->json('POST', '/api/v1/ftthApplications', $ftthApplication);

        $this->assertApiResponse($ftthApplication);
    }

    /**
     * @test
     */
    public function testReadFtthApplication()
    {
        $ftthApplication = $this->makeFtthApplication();
        $this->json('GET', '/api/v1/ftthApplications/'.$ftthApplication->id);

        $this->assertApiResponse($ftthApplication->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFtthApplication()
    {
        $ftthApplication = $this->makeFtthApplication();
        $editedFtthApplication = $this->fakeFtthApplicationData();

        $this->json('PUT', '/api/v1/ftthApplications/'.$ftthApplication->id, $editedFtthApplication);

        $this->assertApiResponse($editedFtthApplication);
    }

    /**
     * @test
     */
    public function testDeleteFtthApplication()
    {
        $ftthApplication = $this->makeFtthApplication();
        $this->json('DELETE', '/api/v1/ftthApplications/'.$ftthApplication->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ftthApplications/'.$ftthApplication->id);

        $this->assertResponseStatus(404);
    }
}
