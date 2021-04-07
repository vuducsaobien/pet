<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\CommentModel;
use Faker\Generator as Faker;

$factory->define(CommentModel::class, function (Faker $faker) {
    return [
        'product_id'=>rand(1,20),
        'customer_id'=>rand(1,13),
        'star'=>rand(1,5),
        'message'=>$faker->sentence,
        'ip'=>'192.168.1.1',
        'name'=>$faker->name,
        'email'=>$faker->email,
        'status'=>'active'
    ];

});
