<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

/**
 * Comando artisan
 * php artisan make:factory TaskFactory --model=Task
 * 
 * --model: flag para indicar a artisan que agrege automáticamente el modelo en la firma del metodo factory
 *          a través del espacio de nombres asigando
 */

$factory->define(Task::class, function (Faker $faker) {
    return [
        'keep' => $faker->sentence,
    ];
});
