<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment')->insert(
            [
                [
                    'type' => 'cash',
                    'created'=>now(),
                    'created_by'=>'admin'

                ],
                [
                    'type' => 'card',
                    'created'=>now(),
                    'created_by'=>'admin'

                ],
            ]);
    }
}
