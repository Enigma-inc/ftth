<?php

namespace Tests\Unit;

use App\Location;
use App\Survey;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SurveyUnitTest extends TestCase
{
    protected $survey;
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->survey = factory(Survey::class)->create();
    }


    /** @test */
    public function a_survey_has_location()
    {
        $this->assertInstanceOf(Location::class, $this->survey->location);
    }
}
