<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_infoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_info')->truncate();
        for ($i=1;$i<=20;$i++){


            DB::table('user_info')->insert(
                [
                    'user_id' => $i,
                    'fullname' => 'hung'.$i,
                    'password' => 'hung'.$i
                ]);
        }
    }
}
