<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_attribute')->insert([
            [
                'product_id' => 1,
                'attribute_id' => 1,
                'value' => 'orange'
            ],
            [
                'product_id' => 1,
                'attribute_id' => 1,
                'value' => 'green'
            ],

        ]);
    }
}
