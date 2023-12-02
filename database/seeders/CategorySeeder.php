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
                'name' => "Category 1",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 2,
                'name' => "Category 2",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 3,
                'name' => "Category 3",
                'parent_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // ======== END Category Level 1 =========


            // ======== Category Level 2 =========
            // Parent Category 1
            [
                // 'id' => 4,
                'name' => "Category 1.1",
                'parent_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 5,
                'name' => "Category 1.2",
                'parent_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 6,
                'name' => "Category 1.3",
                'parent_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Parent Category 2
            [
                // 'id' => 7,
                'name' => "Category 2.1",
                'parent_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 8,
                'name' => "Category 2.2",
                'parent_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 9,
                'name' => "Category 2.3",
                'parent_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Parent Category 3
            [
                // 'id' => 10,
                'name' => "Category 3.1",
                'parent_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 11,
                'name' => "Category 3.2",
                'parent_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 12,
                'name' => "Category 3.3",
                'parent_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // ======== END Category Level 2 =========


            // ======== Category Level 3 =========
            // Parent Category 1.1
            [
                // 'id' => 13,
                'name' => "Category 1.1.1",
                'parent_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 14,
                'name' => "Category 1.1.2",
                'parent_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                // 'id' => 15,
                'name' => "Category 1.1.3",
                'parent_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // ======== END Category Level 3 =========
        ]);

    }
}
