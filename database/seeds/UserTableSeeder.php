<?php

use App\Models\TestimonialModel;
use App\Models\UserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserModel::class, 10)->create();

    }
}
