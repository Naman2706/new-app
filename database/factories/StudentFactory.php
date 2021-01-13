<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'contactno'=>$faker->phoneNumber,
        'percentage'=>$faker->randomFloat($nbMaxDecimals = 2, $min =0 , $max = 100),
    ];
});
