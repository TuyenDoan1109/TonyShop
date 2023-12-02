<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $j = 1;
//        for ($i = 1; $i <= 10000; $i++) {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('posts')->insert([
                [
                    'name' => 'Post ' . $i,
                    'content' => 'Post Content ' . $i,
                    'admin_id' => $j,
                    'created_at' => Carbon::now()->subMonth(rand(1, 12)),
//                    'updated_at' => now()
                ],
            ]);
            $j++;
            if($j == 10) {
                $j = 1;
            }
        }
    }
}
