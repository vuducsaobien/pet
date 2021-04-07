<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ArticleModel;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$k=0;

$factory->define(ArticleModel::class, function (Faker $faker) use (&$k){
    $k++;
    $name='Thức ăn cho các thú cưng '.$k;
    return [
        'name' => $name ,
        'slug'=>Str::slug($name),
        'status' => 'active',
        'content' =>$faker->paragraph(),
        'thumb'=>'/images/article/blog-'.rand(1,9).'.jpg',
        'created'=>now(),
        'created_by'=>'admin'



    ];
});
