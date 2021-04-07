<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\TeamModel;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$b=0;
$factory->define(TeamModel::class, function (Faker $faker) use (&$b){
    $b++;
    $arr=['a','Đức','Hùng','Huy',"Anh Lân","Trung"];
    return [
            'name' => $arr[$b],
            'job'=>'Developer',
            'thumb'=>'/images/avatar/ava'.$b.'.jpg',
            'created'=>now(),
            'created_by'=>'admin'
    ];

});
