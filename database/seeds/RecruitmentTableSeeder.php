<?php

use App\Models\ProductModel;
use App\Models\RecruitmentModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RecruitmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RecruitmentModel::class, 8)->create();

    }
}
