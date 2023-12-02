<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            // Super Admin
            [
                'name' => 'Tuyen_superadmin_1',
                'email' => 'doantuyen90@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tuyen_superadmin_2',
                'email' => 'tuyen_admin@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Giám đốc
            [
                'name' => 'Hao_giam_doc',
                'email' => 'hao_admin@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Quản lý
            [
                'name' => 'Thang_quanly_1',
                'email' => 'thang_admin_1@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Thang_quanly_2',
                'email' => 'thang_admin_2@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Thang_quanly_3',
                'email' => 'thang_admin_3@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Nhân viên
            [
                'name' => 'Khai_nhan_vien_1',
                'email' => 'khai_admin_1@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Khai_nhan_vien_2',
                'email' => 'khai_admin_2@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Khai_nhan_vien_3',
                'email' => 'khai_admin_3@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);

        for ($i = 1; $i <= 50; $i++) {
            if($i % 2 == 0) {
                DB::table('admins')->insert([
                    [
                        'name' => 'Admin_' . $i,
                        'email' => 'admin_' . $i .'@gmail.com',
                        'email_verified_at' => now(),
                        'password' => Hash::make('12345678'),
                        'remember_token' => Str::random(10),
                        'status' => '0',
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            } else {
                DB::table('admins')->insert([
                    [
                        'name' => 'Admin_' . $i,
                        'email' => 'admin_' . $i .'@gmail.com',
                        'email_verified_at' => now(),
                        'password' => Hash::make('12345678'),
                        'remember_token' => Str::random(10),
                        'status' => '1',
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }

        }
    }
}
