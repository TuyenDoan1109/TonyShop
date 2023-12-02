<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_permission')->insert([

            // Role Super Admin
            [
                'role_id' => '1',
                'permission_id' => '1'
            ],
            [
                'role_id' => '1',
                'permission_id' => '2'
            ],
            [
                'role_id' => '1',
                'permission_id' => '3'
            ],
            [
                'role_id' => '1',
                'permission_id' => '4'
            ],
            [
                'role_id' => '1',
                'permission_id' => '5'
            ],
            [
                'role_id' => '1',
                'permission_id' => '6'
            ],
            [
                'role_id' => '1',
                'permission_id' => '7'
            ],
            [
                'role_id' => '1',
                'permission_id' => '8'
            ],
            [
                'role_id' => '1',
                'permission_id' => '9'
            ],
            [
                'role_id' => '1',
                'permission_id' => '10'
            ],
            [
                'role_id' => '1',
                'permission_id' => '11'
            ],
            [
                'role_id' => '1',
                'permission_id' => '12'
            ],
            [
                'role_id' => '1',
                'permission_id' => '13'
            ],
            [
                'role_id' => '1',
                'permission_id' => '14'
            ],
            [
                'role_id' => '1',
                'permission_id' => '15'
            ],
            [
                'role_id' => '1',
                'permission_id' => '16'
            ],
            [
                'role_id' => '1',
                'permission_id' => '17'
            ],
            [
                'role_id' => '1',
                'permission_id' => '18'
            ],
            [
                'role_id' => '1',
                'permission_id' => '19'
            ],
            [
                'role_id' => '1',
                'permission_id' => '20'
            ],
            [
                'role_id' => '1',
                'permission_id' => '21'
            ],
            [
                'role_id' => '1',
                'permission_id' => '22'
            ],
            [
                'role_id' => '1',
                'permission_id' => '23'
            ],
            [
                'role_id' => '1',
                'permission_id' => '24'
            ],
            [
                'role_id' => '1',
                'permission_id' => '25'
            ],
            [
                'role_id' => '1',
                'permission_id' => '26'
            ],
            [
                'role_id' => '1',
                'permission_id' => '27'
            ],
            [
                'role_id' => '1',
                'permission_id' => '28'
            ],


            // Role Giám đốc
            [
                'role_id' => '2',
                'permission_id' => '1'
            ],
            [
                'role_id' => '2',
                'permission_id' => '2'
            ],
            [
                'role_id' => '2',
                'permission_id' => '3'
            ],
            [
                'role_id' => '2',
                'permission_id' => '4'
            ],

            // Role Quản lý 1
            [
                'role_id' => '3',
                'permission_id' => '5'
            ],
            [
                'role_id' => '3',
                'permission_id' => '6'
            ],
            [
                'role_id' => '3',
                'permission_id' => '7'
            ],
            [
                'role_id' => '3',
                'permission_id' => '8'
            ],

            // Role Quản lý 2
            [
                'role_id' => '4',
                'permission_id' => '9'
            ],
            [
                'role_id' => '4',
                'permission_id' => '10'
            ],
            [
                'role_id' => '4',
                'permission_id' => '11'
            ],
            [
                'role_id' => '4',
                'permission_id' => '12'
            ],

            // Role Quản lý 3
            [
                'role_id' => '5',
                'permission_id' => '5'
            ],
            [
                'role_id' => '5',
                'permission_id' => '6'
            ],
            [
                'role_id' => '5',
                'permission_id' => '7'
            ],
            [
                'role_id' => '5',
                'permission_id' => '8'
            ],
            [
                'role_id' => '5',
                'permission_id' => '9'
            ],
            [
                'role_id' => '5',
                'permission_id' => '10'
            ],
            [
                'role_id' => '5',
                'permission_id' => '11'
            ],
            [
                'role_id' => '5',
                'permission_id' => '12'
            ],

            // Role Nhân viên 1
            [
                'role_id' => '6',
                'permission_id' => '5'
            ],
            [
                'role_id' => '6',
                'permission_id' => '6'
            ],

            // Role Nhân viên 2
            [
                'role_id' => '7',
                'permission_id' => '9'
            ],
            [
                'role_id' => '7',
                'permission_id' => '10'
            ],

            // Role Nhân viên 3
            [
                'role_id' => '8',
                'permission_id' => '5'
            ],
            [
                'role_id' => '8',
                'permission_id' => '6'
            ],
            [
                'role_id' => '8',
                'permission_id' => '9'
            ],
            [
                'role_id' => '8',
                'permission_id' => '10'
            ],
        ]);
    }
}
