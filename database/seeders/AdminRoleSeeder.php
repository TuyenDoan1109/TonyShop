<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_role')->insert([

            // Role Super Admin
            [
                'role_id' => '1',
                'admin_id' => '1',
            ],
            [
                'role_id' => '1',
                'admin_id' => '2',
            ],

            // Role Giám đốc
            [
                'role_id' => '2',
                'admin_id' => '3',
            ],

            // Role Quản lý 1
            [
                'role_id' => '3',
                'admin_id' => '4',
            ],

            // Role Quản lý 2
            [
                'role_id' => '4',
                'admin_id' => '5',
            ],

            // Role Quản lý 3
            [
                'role_id' => '5',
                'admin_id' => '6',
            ],

            // Role Nhân viên 1
            [
                'role_id' => '6',
                'admin_id' => '7',
            ],

            // Role Nhân viên 2
            [
                'role_id' => '7',
                'admin_id' => '8',
            ],

            // Role Nhân viên 3
            [
                'role_id' => '8',
                'admin_id' => '9',
            ],
        ]);
    }
}
