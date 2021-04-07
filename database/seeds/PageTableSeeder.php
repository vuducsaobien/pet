<?php

use App\Models\ArticleModel;
use App\Models\PageModel;
use App\Models\TeamModel;
use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PageModel::class, 4)->create();

    }
}
