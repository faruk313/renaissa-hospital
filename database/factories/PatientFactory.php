<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    $patient_id_pre = "p";
    $patient_id_post = $faker->unique()->randomNumber($nbDigits = 8);
    return [
        'patient_id'            =>$patient_id_pre.$patient_id_post,
        'patient_name'          =>$faker->name,
        'patient_mobile'        =>$faker->unique()->phoneNumber,
        'patient_age'           =>$faker->numberBetween(0,99), //number between 0-99
        'patient_gender'        =>$faker->boolean(),
        'patient_address'       =>$faker->address,
        'patient_note'          =>$faker->text($maxNbChars = 50),
        'patient_status'        =>true,//active
        'user_id'               =>function (){
            return App\Models\User::inRandomOrder()->first()->id;
        }
    ];
});
