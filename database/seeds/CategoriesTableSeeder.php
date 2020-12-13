<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert(
            [
                [
                    'name' => 'Cơm',
                    'parent_id' => '-1',
                ],
                [
                    'name' => 'Bánh',
                    'parent_id' => '-1',
                ],
                [
                    'name' => 'Nước',
                    'parent_id' => '-1',
                ],
                [
                    'name' => 'Gà',
                    'parent_id' => '-1',
                ],
                [
                    'name' => 'Kem',
                    'parent_id' => '-1',
                ],
                [
                    'name' => 'Khác',
                    'parent_id' => '-1',
                ],
            ]

        );
    }
}
