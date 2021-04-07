<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductAttributeModel;
use Faker\Generator as Faker;

$factory->define(ProductAttributeModel::class, function (Faker $faker) {
    return [
        'product_id'=>1,
        'attribute_id'=>1,
        'value'=>'orange'
    ];
});
