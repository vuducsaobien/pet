<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TestimonialModel;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(TestimonialModel::class, function (Faker $faker) {
        $array=[1,2,3];
        $random = Arr::random($array);
        $array2=['CEO','Developer','Customer'];
        $random2 = Arr::random($array2);


    return [
        'status'=>'active',
        'created'=>now(),
        'created_by'=>'admin',
        'name' =>$faker->name,
        'content'=>$faker->paragraph(),
        'thumb'=>'/images/avatar/'.$random.'.jpg',
        'job'=>$random2
    ];
});
