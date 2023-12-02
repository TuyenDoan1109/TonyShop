<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            [
                'name' => "Black",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "White",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Red",
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
