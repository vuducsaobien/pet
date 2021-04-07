<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PageModel;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$r=-1;
$factory->define(PageModel::class, function (Faker $faker) use (&$r) {
    $name=$faker->name;
    $r++;
    $arr=['Help & Contact Us','Return & Refunds',
        'Online Stores','Terms & Conditions'];
    return [
        'name'=>$arr[$r],
        'slug'=>Str::slug($name),
        'content'=>$faker->paragraph,
        'created'=>now(),
        'created_by'=>'admin'
    ];
});
