<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //----------- C1 ----------------------
        // Subcategories 1 - C1
        for($i = 1; $i <= 2; $i++) {
            DB::table('products')->insert([
                [
                    'name' => "Product $i - Sc1 - C1",
                    'subcategory_id' => '1',
                    'brand_id' => '1',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }

        // Subcategories 2 - C1
        for($i = 1; $i <= 2; $i++) {
            DB::table('products')->insert([
                [
                    'name' => "Product $i - Sc2 - C1",
                    'subcategory_id' => '2',
                    'brand_id' => '1',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }

        // Subcategories 3 - C1
        for($i = 1; $i <= 2; $i++) {
            DB::table('products')->insert([
                [
                    'name' => "Product $i - Sc3 - C1",
                    'subcategory_id' => '3',
                    'brand_id' => '1',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }
        //----------- END C1 ----------------------

        //----------- C2 ----------------------
        // Subcategories 1 - C2
        for($i = 1; $i <= 2; $i++) {
            DB::table('products')->insert([
                [
                    'name' => "Product $i - Sc1 - C2",
                    'subcategory_id' => '4',
                    'brand_id' => '2',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }

        // Subcategories 2 - C2
        for($i = 1; $i <= 2; $i++) {
            DB::table('products')->insert([
                [
                    'name' => "Product $i - Sc2 - C2",
                    'subcategory_id' => '5',
                    'brand_id' => '2',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }

        // Subcategories 3 - C2
        for($i = 1; $i <= 2; $i++) {
            DB::table('products')->insert([
                [
                    'name' => "Product $i - Sc3 - C2",
                    'subcategory_id' => '6',
                    'brand_id' => '2',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }
        //----------- END C2 ----------------------

        //----------- C3 ----------------------
        // Subcategories 1 - C3
        for($i = 1; $i <= 2; $i++) {
            DB::table('products')->insert([
                [
                    'name' => "Product $i - Sc1 - C3",
                    'subcategory_id' => '7',
                    'brand_id' => '3',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }

        // Subcategories 2 - C3
        for($i = 1; $i <= 2; $i++) {
            DB::table('products')->insert([
                [
                    'name' => "Product $i - Sc2 - C3",
                    'subcategory_id' => '8',
                    'brand_id' => '3',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }

        // Subcategories 3 - C3
        for($i = 1; $i <= 2; $i++) {
            DB::table('products')->insert([
                [
                    'name' => "Product $i - Sc3 - C3",
                    'subcategory_id' => '9',
                    'brand_id' => '3',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }
        //----------- END C3 ----------------------
    }
}
