<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discount')->insert(
            [
                [
                    'code' => 'abc',
                    'date_start'=>now(),
                    'date_end'=>now(),
                    'created_by'=>'admin',
                    'created'=>now()
                ],
            ]);
    }
}
