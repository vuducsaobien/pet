<?php

use App\Models\ArticleModel;
use App\Models\CustomerModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CustomerModel::class, 30)->create();

    }
}
