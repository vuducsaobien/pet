<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute')->insert(
            [
                [
                    'name' => 'Color',
                    'status' => 'active',
                    'ordering'=>1,
                    'created'=>now(),
                    'created_by'=>'admin',
                ],
                [
                    'name' => 'Size',
                    'status' => 'active',
                    'ordering'=>2,
                    'created'=>now(),
                    'created_by'=>'admin',
                ],
                [
                    'name' => 'Length',
                    'status' => 'active',
                    'ordering'=>3,
                    'created'=>now(),
                    'created_by'=>'admin',
                ],
                [
                    'name' => 'Brand',
                    'status' => 'active',
                    'ordering'=>4,
                    'created'=>now(),
                    'created_by'=>'admin',
                ],
            ]);
    }
}
