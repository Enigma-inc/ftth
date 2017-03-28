<?php

namespace Tests\Feature;

use App\Survey;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SurveysTest extends TestCase
{
       use DatabaseMigrations;
  /** @test */
  public function an_authenticated_user_can_reach_survey_page(){
      //Given we have an-authenticated
      //when we visit create a survey page
      //then we should have access to the page
        $this->get('/surveys/create')
            ->assertStatus(200);

  }

  /** @test */
  public function an_authenticated_visitor_can_place_a_request(){
      //Given we have an-authenticated visitor
      //when a visitor post a request to survey
      //then we should get a status code 200
      // and see the record in db
      $survey= factory(Survey::class)->make();
      $this->post('/surveys',$survey->toArray())
           ->assertStatus(200);
  }
}
