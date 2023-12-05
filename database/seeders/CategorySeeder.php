<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            // ======== Category Level 1 =========
            [
                // 'id' => 1,
                'name' => "Điện thoại",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 2,
                'name' => "Laptop",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 3,
                'name' => "Tablet",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 4,
                'name' => "Màn hình",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 5,
                'name' => "Smart TV",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 6,
                'name' => "Đồng hồ",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 7,
                'name' => "Âm thanh",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 8,
                'name' => "Smart home",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 9,
                'name' => "Phụ kiện",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => ,
                'name' => "Đồ chơi CN",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => ,
                'name' => "Máy trôi",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => ,
                'name' => "Sửa chữa",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => ,
                'name' => "Dịch vụ",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => ,
                'name' => "Tin hot",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => ,
                'name' => "Ưu đãi",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // ======== END Category Level 1 =========
        ]);

    }
}
