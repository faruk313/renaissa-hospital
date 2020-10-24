<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RefUser;
use Faker\Generator as Faker;

$factory->define(RefUser::class, function (Faker $faker) {
    $ref_user_id_pre = "rp";
    $ref_user_id_post = $faker->unique()->randomNumber($nbDigits = 8);
    return [
        'ref_user_id'            =>$ref_user_id_pre.$ref_user_id_post,
        'ref_user_name'          =>$faker->name,
        'ref_user_mobile'        =>$faker->unique()->phoneNumber,
        'ref_user_note'          =>$faker->text($maxNbChars = 50),
        'ref_user_status'        =>true,//active
        'user_id'                =>function (){
            return App\Models\User::inRandomOrder()->first()->id;
        }
    ];
});
