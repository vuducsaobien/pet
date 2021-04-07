<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ShippingModel;
use Faker\Generator as Faker;

$factory->define(ShippingModel::class, function (Faker $faker) {
    return [
        'zip_postal_code'=>70000,
        'fee'=>10000,
        'name'=>'TPHCM',
        'created'=>now(),
        'created_by'=>'admin'
    ];
});
