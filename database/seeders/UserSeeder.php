<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'tuyen_user',
                'email' => 'tuyen_user@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'doantuyen',
                'email' => 'doantuyen90@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);

        for ($i = 1; $i <= 50; $i++) {
            if($i % 2 == 0) {
                DB::table('users')->insert([
                    [
                        'name' => 'User_' . $i,
                        'email' => 'user_' . $i .'@gmail.com',
                        'email_verified_at' => now(),
                        'password' => Hash::make('12345678'),
                        'remember_token' => Str::random(10),
                        'status' => 0,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            } else {
                DB::table('users')->insert([
                    [
                        'name' => 'User_' . $i,
                        'email' => 'user_' . $i .'@gmail.com',
                        'email_verified_at' => now(),
                        'password' => Hash::make('12345678'),
                        'remember_token' => Str::random(10),
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }

        }

    }
}
