<?php

use App\Models\CommentModel;
use App\Models\CustomerModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CommentModel::class, 30)->create();
    }
}
