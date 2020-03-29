<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vaccine;
use Faker\Generator as Faker;

$factory->define(Vaccine::class, function (Faker $faker) {
    return [
    //   'user_id' => factory(\App\User::class),
      'user_id' => '1',
      'vaccine_name' => $faker->sentence,
      'vaccine_description' => $faker->paragraph,
      'vaccine_side_effect' =>$faker->sentence,
      'diseases_description' => $faker->paragraph,
      'qualified_candidate' => $faker->firstNameMale,
      'disqualified_candidate' => $faker->firstNameFemale,
      'precautions' => $faker->text,
      'required_doses' => $faker->randomDigit,
      'taken_doses' => $faker->randomDigit,
       'age' => $faker->randomDigit,
    ];
});
