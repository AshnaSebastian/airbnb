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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Country::class, function (Faker\Generator $faker) {
    $country = $faker->country;
    $slug = str_slug($country);

    return [
        'name' => $country,
        'slug'  => $slug
    ];
});

$factory->define(App\Room::class, function (Faker\Generator $faker) {
    return [
    	'user_id'	=> factory(App\User::class)->create()->id,
        'country_id'   => factory(App\Country::class)->create()->id,
        'name' => $faker->sentence,
        'slug'	=> $faker->slug,
        'price'	=> $faker->randomNumber(2),
        'minimum_stay'  => 1
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        'path'  => $faker->imageUrl(1400, 720),
        'imageable_id'  => factory(App\Room::class)->create()->id,
        'imageable_type' => 'App\Room'
    ];
});
