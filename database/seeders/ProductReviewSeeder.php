<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;
class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);
        for($i = 1; $i <= 100; $i++) {
            DB::table('product_reviews')->insert([
                [
                    'author' => $faker->name,
                    'content' => 'Review ' . $i,
                    'product_id' => random_int(1, 18),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }
    }
}
