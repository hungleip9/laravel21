<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        for ($i=1;$i<=8;$i++){


            DB::table('products')->insert(
                [
                    'name' => 'sanpham'.$i,
                    'status' =>'1',
                    'category_id' => '2',
                    'origin_price' => '30000',
                    'sale_price' => '25000',
                    'user_id' => '1',
                ]);
        }
    }
}
