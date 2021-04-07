<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductImageModel;
use Faker\Generator as Faker;
$w=0;
$factory->define(ProductImageModel::class, function (Faker $faker) use (&$w) {
    $w++;
    return [
        'product_id'=>rand(1,10),
        'name'=>"l".rand(1,9).'.jpg',
    ];
});
