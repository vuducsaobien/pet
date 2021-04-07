<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert(
        [[
                'name'      => 'Home',
                'type_link' => 'current',
                'type_menu' => 'link',
                'status'    => 'active',
                'link'      => '/'
            ],[
                'name'      => 'Food',
                'type_link' => 'current',
                'type_menu' => 'category_product',
                'status'    => 'active',
                'link'      => '/all-food.html'
            ],[
                'name'      => 'Blog',
                'type_link' => 'current',
                'type_menu' => 'link',
                'status'    => 'active',
                'link'      => '/bai-viet/list-blog.html'

            ],[
                'name'      => 'About',
                'type_link' => 'current',
                'type_menu' => 'link',
                'status'    => 'active',
                'link'      => '/about-us'
            ],[
                'name'      => 'Contact Us',
                'type_link' => 'current',
                'type_menu' => 'link',
                'link'      => '/lien-he',
                'status'    => 'active'
        ],]);
    }
}
