<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductRamColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 18; $i++){
            for ($j = 1; $j <= 3; $j++){
                for ($k = 1; $k <= 3; $k++){
                    DB::table('product_ram_color')->insert([
                        [
                            'product_id' => "$i",
                            'ram_id' => "$j",
                            'color_id' => "$k",
                            'quantity' => random_int(5, 25),
                            'created_at' => now(),
                            'updated_at' => now()
                        ],
                    ]);
                }
            }
        }
    }
}
