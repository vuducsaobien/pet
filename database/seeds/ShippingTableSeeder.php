<?php

use App\Models\ShippingModel;
use App\Models\TeamModel;
use Illuminate\Database\Seeder;

class ShippingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShippingModel::class, 1)->create();

    }
}
