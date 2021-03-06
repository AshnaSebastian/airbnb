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
        'country_id'    => factory(App\Country::class)->create()->id,
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
        'user_id'   => 1,
        'name' => $faker->sentence,
        'slug'	=> $faker->slug,
        'price'	=> $faker->randomNumber(2),
        'aboutListing'  => $faker->paragraph,
        'propertyType'  => 'Apartment',
        'roomType'  => 'Private Room',
        'accommodates'  => 2,
        'bathrooms' => 1,
        'bedType'  => 'Real Bed',
        'bedrooms'  => 1,
        'beds'  => 2,
        'checkIn'   => '12:01 PM',
        'checkOut'  => '11:59 AM',
        'extraPeopleFee'    => 0,
        'cleaningFee'  => 5,
        'description' => $faker->paragraph,
        'minimumStay'  => 1
    ];
});

$factory->define(App\Amenity::class, function(Faker\Generator $faker) {
    return [
        'name'  => $faker->sentence
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        'path'  => $faker->imageUrl(1400, 720),
        'imageable_id'  => 1,
        'imageable_type' => 'App\Room'
    ];
});
