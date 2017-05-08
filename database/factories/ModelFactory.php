<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Location;
use App\Survey;
use App\District;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Survey::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'surname' => $faker->name,
        'phone_office' => $faker->phoneNumber,
        'phone_home' => $faker->phoneNumber,
        'phone_mobile' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'location_id'=>function(){return factory(Location::class)->create()->id;},
        'district_id'=>function(){return factory(District::class)->create()->id;}
    ];
});

$factory->define(Location::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->city,
    ];
});
$factory->define(District::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->city,
        'code' => $faker->word,
    ];
});
