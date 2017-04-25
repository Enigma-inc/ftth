<?php

use App\Location;
use App\Survey;
use App\User;
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
        //Seed Locations
        factory(Location::class,15)->create();
        $locations=Location::all();

        foreach ($locations as $location) {
            factory(Survey::class)->create([
                'location_id' => $location->id
            ]);
        }

        //Seed Default User
        factory(User::class)->create(
            [
                'name' => 'mokoneaneo',
                'email' => 'neo@enigma.co.ls',
                'password' => bcrypt('enigma'),
            ]
        );

    }
}
