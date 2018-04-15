<?php

use Faker\Generator as Faker;

$factory->define(\App\Patient::class, function (Faker $faker) {
    return [
        'name'=> $faker->name(),
        'date_birth'=> $faker->dateTime(),
        'active'=> 1,
        'age'=> 18
    ];
});
