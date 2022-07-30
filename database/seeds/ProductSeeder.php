<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                [
                    'code' => "B001",
                    'name' => "Kopi",
                    'price' => 2.5,
                    'type' => "drink"
                ],
                [
                    'code' => "F001",
                    'name' => "Roti Kosong",
                    'price' => 1.5,
                    'type' => "food"
                ],
                [
                    'code' => "B002",
                    'name' => "Teh Tarik",
                    'price' => 2,
                    'type' => "drink"
                ],
            ]
        );
    }
}

