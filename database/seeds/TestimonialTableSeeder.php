<?php

use App\Models\ArticleModel;
use App\Models\TestimonialModel;
use Illuminate\Database\Seeder;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TestimonialModel::class, 10)->create();

    }
}
