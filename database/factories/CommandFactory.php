<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Command;
use Faker\Generator as Faker;

$factory->define(Command::class, function (Faker $faker) {
    return [
        'user_id' => App\User::pluck('id')->random(),
        'car_id' => App\Car::pluck('id')->random(),
        'dateL' => $faker->dateTime(),
        'dateR' => $faker->dateTime(),
        'prixTTC' => $faker->randomDigit(100,500),
        'notes' => $faker->paragraphs(rand(3,10), true)
    ];
});
