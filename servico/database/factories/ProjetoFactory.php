<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Projeto;
use App\User;
use Faker\Generator as Faker;

$factory->define(Projeto::class, function (Faker $faker) {
    return [
        'titulo' => $faker->company,
        'descricao' => $faker->text,
        'gerente_id' => factory(User::class)->create()->id
    ];
});
