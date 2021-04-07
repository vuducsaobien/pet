<?php

use App\Models\ProductImageModel;
use App\Models\ProductModel;
use Illuminate\Database\Seeder;

class ProductImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductImageModel::class, 60)->create();
    }
}
