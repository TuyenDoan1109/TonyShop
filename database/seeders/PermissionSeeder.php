<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([

            // Nhóm quyền với Admin
            [
                'name' => 'admin-view',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'admin-add',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'admin-edit',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'admin-delete',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Nhóm quyền với Category
            [
                'name' => 'category-view',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'category-add',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'category-edit',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'category-delete',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Nhóm quyền với Subcategory
            [
                'name' => 'subcategory-view',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'subcategory-add',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'subcategory-edit',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'subcategory-delete',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Nhóm quyền với Post
            [
                'name' => 'post-view',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'post-add',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'post-edit',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'post-delete',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Nhóm quyền với Product
            [
                'name' => 'product-view',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'product-add',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'product-edit',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'product-delete',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Nhóm quyền với User
            [
                'name' => 'user-view',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'user-add',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'user-edit',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'user-delete',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Nhóm quyền với Brand
            [
                'name' => 'brand-view',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'brand-add',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'brand-edit',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'brand-delete',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
