<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\UserModel;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
$l=1;
$factory->define(UserModel::class, function (Faker $faker) use (&$l) {
    return [
                'username' => 'admin'.$l,
                'email' => 'admin@gmail.com',
                'password' => md5('1'), // password
                'fullname' => 'admin',
                'thumb' => '/images/user/1ctW8mj8vq.png',
                'level' => 'admin',
                'status' => 'active',
                'created'=>now(),
                'created_at'=>now(),
                'created_by'=>'admin',
                'modified'=>now(),
                'modified_by'=>'admin',
            ];


});
