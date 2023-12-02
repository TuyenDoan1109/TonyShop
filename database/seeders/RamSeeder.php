<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rams')->insert([
            [
                'name' => "4G",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "6G",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "8G",
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
