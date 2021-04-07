<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\CustomerModel;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(CustomerModel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => 'active',
        'email'=>$faker->email,
        'phone'=>$faker->phoneNumber,
        'address'=>$faker->address,
        'ip'=>'192.168.1.1',
        'created'=>now(),
        'created_by'=>'admin',
    ];

});
