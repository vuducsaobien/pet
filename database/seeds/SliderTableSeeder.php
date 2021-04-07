<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider')->insert(
            [
                [
                    'name' => 'We keep pets for pleasure.',
                    'description' => 'Food & Vitamins <br /> For all pets',
                    'link'=>'http://8.0.test',
                    'thumb'=>'/images/slider/slider1.png',
                    'created'=>now(),
                    'status'=>'active',
                    'created_by'=>'admin'
                ],
                [
                    'name' => 'We keep pets for pleasure 2.',
                    'description' => 'Food & Vitamins <br /> For all pets',
                    'link'=>'http://8.0.test',
                    'thumb'=>'/images/slider/slider2.png',
                    'created'=>now(),
                    'status'=>'active',
                    'created_by'=>'admin'
                ],
            ]);
    }
}
