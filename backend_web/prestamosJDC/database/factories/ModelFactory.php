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

$factory->define(App\UserType::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Admin'
    ];
});

$factory->define(App\UserStatus::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Activo'
    ];
});

$factory->define(App\Gender::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Masculino'
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'dni' => $faker->randomNumber($nbDigits = 7, $strict = false),
        'cellphone_number' => $faker->randomNumber($nbDigits = 7, $strict = false),
        'user_type_id' => 1,
        'user_status_id' => 1,
        'dni_type_id' => 1,
        'gender_id' => 1
    ];
});

$factory->define(App\Departament::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName
    ];
});

$factory->define(App\Town::class, function (Faker\Generator $faker) {
	$departament = App\Departament::all()->pluck('id')->toArray();
    return [
        'name' => $faker->firstName,
        'departament_id' => $faker->randomElement($departament)
         // Any other Fields in your Comments Model 
    ];
});

$factory->define(App\Headquarter::class, function (Faker\Generator $faker) {
	$town = App\Town::all()->pluck('id')->toArray();
    return [
        'name' => $faker->firstName,
        'address' => $faker->firstName,
        'town_id' => $faker->randomElement($town)
         // Any other Fields in your Comments Model 
    ];
});

$factory->define(App\Building::class, function (Faker\Generator $faker) {
	$headquarter = App\Headquarter::all()->pluck('id')->toArray();
    return [
        'name' => $faker->firstName,
        'headquarter_id' => $faker->randomElement($headquarter)
         // Any other Fields in your Comments Model 
    ];
});
