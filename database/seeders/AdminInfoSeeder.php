<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_infos')->insert([
            [
                'admin_id' => '1',
                'social_id' => '112450765',
                'address' => 'Phú Xuyên, Hà Nội',
                'phone' => '0936827526',
                'avatar' => 'tuyen_admin.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'admin_id' => '2',
                'social_id' => '112450766',
                'address' => 'Cầu Giấy, Hà Nội',
                'phone' => '0936827527',
                'avatar' => 'tuyen_admin.png',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
