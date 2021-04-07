<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert(
            [
                [
                    'name'       => 'root',
                    'slug'       => 'root',
                    'status'     => 'active',
                    'parent_id'  => 0,
                    '_lft'       => 1,
                    '_rgt'       => 20,
                    'created'    => now(),
                    'created_by' => 'admin',
                    'thumb'      => '/images/category/cate1.jpg',
                    'is_home'    => 'yes',
                    'display'    => 'grid',
                ],
                [
                    'name'       => 'dogs food',
                    'slug'       => 'dogs-food',
                    'status'     => 'active',
                    'parent_id'  => 1,
                    '_lft'       => 2,
                    '_rgt'       => 7,
                    'created'    => now(),
                    'created_by' => 'admin',
                    'thumb'      => '/images/category/cate1.jpg',
                    'is_home'    => 'yes',
                    'display'    => 'grid',

                ],
                [
                    'name'       => 'cats food',
                    'slug'       => 'cats-food',
                    'status'     => 'active',
                    'parent_id'  => 1,
                    '_lft'       => 8,
                    '_rgt'       => 13,
                    'created'    => now(),
                    'created_by' => 'admin',
                    'thumb'      => '/images/category/cate2.jpg',
                    'is_home'    => 'yes',
                    'display'    => 'grid',

                ],
                [
                    'name'       => 'Eggs',
                    'slug'       => 'eggs',
                    'status'     => 'active',
                    'parent_id'  => 2,
                    '_lft'       => 3,
                    '_rgt'       => 4,
                    'created'    => now(),
                    'created_by' => 'admin',
                    'thumb'      => '/images/category/cate1.jpg',
                    'is_home'    => 'yes',
                    'display'    => 'list',

                ],
                [
                    'name'       => 'Carrots',
                    'slug'       => 'carrots',
                    'status'     => 'active',
                    'parent_id'  => 2,
                    '_lft'       => 5,
                    '_rgt'       => 6,
                    'created'    => now(),
                    'created_by' => 'admin',
                    'thumb'      => '/images/category/cate1.jpg',
                    'is_home'    => 'yes',
                    'display'    => 'list',

                ],
                [
                    'name'       => 'fishs food',
                    'slug'       => 'fishs-food',
                    'status'     => 'active',
                    'parent_id'  => 1,
                    '_lft'       => 14,
                    '_rgt'       => 19,
                    'created'    => now(),
                    'created_by' => 'admin',
                    'thumb'      => '/images/category/cate3.jpg',
                    'is_home'    => 'yes',
                    'display'    => 'list',

                ],
                [
                    'name'       => 'Meat',
                    'slug'       => 'meat',
                    'status'     => 'active',
                    'parent_id'  => 3,
                    '_lft'       => 9,
                    '_rgt'       => 10,
                    'created'    => now(),
                    'created_by' => 'admin',
                    'thumb'      => '/images/category/cate1.jpg',
                    'is_home'    => 'yes',
                    'display'    => 'list',

                ],
                [
                    'name'       => 'Cheese',
                    'slug'       => 'cheese',
                    'status'     => 'active',
                    'parent_id'  => 3,
                    '_lft'       => 11,
                    '_rgt'       => 12,
                    'created'    => now(),
                    'created_by' => 'admin',
                    'thumb'      => '/images/category/cate1.jpg',
                    'is_home'    => 'no',
                    'display'    => 'list',

                ],
                [
                    'name'       => 'Rice',
                    'slug'       => 'rice',
                    'status'     => 'active',
                    'parent_id'  => 6,
                    '_lft'       => 15,
                    '_rgt'       => 16,
                    'created'    => now(),
                    'created_by' => 'admin',
                    'thumb'      => '/images/category/cate1.jpg',
                    'is_home'    => 'no',
                    'display'    => 'grid',

                ],
                [
                    'name'       => 'Veggies',
                    'slug'       => 'veggies',
                    'status'     => 'active',
                    'parent_id'  => 6,
                    '_lft'       => 17,
                    '_rgt'       => 18,
                    'created'    => now(),
                    'created_by' => 'admin',
                    'thumb'      => '/images/category/cate1.jpg',
                    'is_home'    => 'yes',
                    'display'    => 'grid',

                ],
            ]);
    }
}
