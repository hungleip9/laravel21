<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert( [
            'name' => 'admin1',
            'email' =>'admin1@gmail.com',
            'password' => bcrypt('hungle'),
            'role' => '3'
        ]);
        for($i=2; $i<=10;$i++){
            DB::table('users')->insert([
                'name' => 'admin'.$i,
                'email' =>'admin'.$i.'@gmail.com',
                'password' => bcrypt('hungle'),
                'role' => '1'
            ]);
        }
    }
}
