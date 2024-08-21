<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed untuk tabel Prices
        DB::table('prices')->insert([
            [
                'id' => 1,
                'outlet_id' => 1,
                'item_id' => 1,
                'price' => 1700,
                'created_at' => '2024-08-20 10:30:33',
                'updated_at' => '2024-08-20 10:30:33',
            ],
            [
                'id' => 2,
                'outlet_id' => 1,
                'item_id' => 2,
                'price' => 1800,
                'created_at' => '2024-08-20 10:30:33',
                'updated_at' => '2024-08-20 10:30:33',
            ],
            [
                'id' => 3,
                'outlet_id' => 1,
                'item_id' => 3,
                'price' => 1700,
                'created_at' => '2024-08-20 10:30:33',
                'updated_at' => '2024-08-20 10:30:33',
            ],
        ]);
    }
}
