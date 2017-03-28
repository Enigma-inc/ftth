<?php
namespace Tests\Feature;
use Tests\TestCase;

class ApplicationFormTest extends TestCase
{
    /** @test */
    public function authenticated_user_should_access_application_form_page()
    {
        //Given we have authenticated user
        //when we visit application form page
        $response=$this->get('/application');

        //then we should be able to see the page
        $response->assertStatus(200);
    }
}
