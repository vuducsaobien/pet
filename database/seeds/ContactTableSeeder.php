<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact')->insert(
            [
                [
                    'name' => 'john',
                    'status' => 'active',
                    'email'=>'abc@gmail.com',
                    'subject'=>'chua nghi ra',
                    'message'=>'chua nghi ra',
                    'ip'=>'192.168.1.1',
                    'created'=>now(),
                    'created_by'=>'admin',

                ],
        ]);
    }
}
