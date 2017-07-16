<?php

use App\Location;
use App\Survey;
use App\User;
use App\District;
use App\FtthLocation;
use Illuminate\Database\Seeder;

class AllTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Seed Districts
        $this->DistrictSeeder();

        //Seed Locations
        $locationsStr = file_get_contents('database/data/survey-locations.json');
        $locationsArr = json_decode($locationsStr, true);   

        $ftthLocationsStr = file_get_contents('database/data/ftth-locations.json');
        $ftthLocationsArr = json_decode($ftthLocationsStr, true);     


        foreach ($locationsArr as $location) {
            
            Location::create([
                'name'=>$location['name'],

            ]);


        }

        foreach ($ftthLocationsArr as $location) {
            
            FtthLocation::create([
                'name'=>$location['name'],
                'description'=>$location['description']

            ]);


        }

        //Seed Surveys
 
        $locations=Location::all()->toArray();
        $districts=District::all()->toArray();

        for ($i=1;$i<=100;$i++) {
            factory(Survey::class)->create([
                'location_id' => $locations[array_rand( $locations)]['id'],
                'district_id' => $districts[array_rand( $districts)]['id'],
                'type'=>array('Business','Home')[rand(0,1)]
            ]);
        }

        

    }

    public function DistrictSeeder()
    {
        
        District::create([
            'name' => 'Berea',
            'code' => 'D'
        ]);
        District::create([
            'name' => 'Botha-Bothe',
            'code' => 'B'
        ]);

        District::create([
            'name' => 'Leribe',
            'code' => 'C'
        ]);
        District::create([
            'name' => 'Mafeteng',
            'code' => 'E'
        ]);
        District::create([
            'name' => 'Maseru',
            'code' => 'A'
        ]);
        District::create([
            'name' => "Mohale's Hoek",
            'code' => 'F'
        ]);
        District::create([
            'name' => 'Mokhotlong',
            'code' => 'J'
        ]);
        District::create([
            'name' => "Qacha's Nek",
            'code' => 'H'
        ]);
        District::create([
            'name' => 'Quthing',
            'code' => 'G'
        ]);
        District::create([
            'name' => 'Thaba Tseka',
            'code' => 'K'
        ]);

    }
}
