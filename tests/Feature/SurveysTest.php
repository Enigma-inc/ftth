<?php

namespace Tests\Feature;

use App\Location;
use App\Survey;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SurveysTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_reach_survey_page()
    {
        //Given we have an-authenticated
        //when we visit create a survey page
        //then we should have access to the page
        $this->get('/surveys/create')
            ->assertStatus(200);

    }

    /** @test */
    public function an_authenticated_visitor_can_place_a_request()
    {
        //Given we have an-authenticated visitor
        //when a visitor post a request to survey
        //then we should get a status code 200
        // and see the record in db
        $locationId = factory(Location::class)->create()->id;
        $survey = factory(Survey::class)->make(['location_id' => $locationId]);


        //dd($survey->toArray());
        $this->post('/surveys', $survey->toArray())
            ->assertStatus(200);
    }

    /** @test */
    public function there_should_exist_locations_in_database()
    {
        //Given we have locations seeded in db
        //When a requests send to the locations end point
        //We should there must be records
        factory(Location::class, 2)->create();
        $locationsCount = count(Location::all()->toArray());
        $this->assertEquals(2, $locationsCount);

    }

    /** @test */
    public function an_authenticated_user_can_access_list_surveys()
    {
        //Given we have an authenticated user
        $this->be(factory(User::class)->create());

        //When we visit surveys page
        $survey = factory(Survey::class)->create([]);
        //then we should be able to see the list of taken surveys
        $this->get('/surveys')
             ->assertSee($survey->name)
            ->assertSee($survey->surname);

    }

}
