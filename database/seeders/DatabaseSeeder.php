<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
//        $this->call(ProductSeeder::class);
        $this->call(UserInfoSeeder::class);
        $this->call(AdminInfoSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(AdminRoleSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(ProductReviewSeeder::class);
        $this->call(RamSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(ProductRamColorSeeder::class);
    }
}
