<?php

use App\Models\TeamModel;
use App\Models\TestimonialModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TeamModel::class, 4)->create();


    }
}
