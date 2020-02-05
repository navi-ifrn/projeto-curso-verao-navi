<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Papel;
use Faker\Generator as Faker;

$factory->define(Papel::class, function (Faker $faker) {
    return [
        'nome' => $faker->jobTitle
    ];
});
