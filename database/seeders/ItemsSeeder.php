<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'id' => 1,
                'name' => 'Mie Keranjang',
                'description' => 'Mie Keranjang',
                'status' => 1,
                'created_at' => '2024-08-20 10:27:13',
                'updated_at' => '2024-08-20 10:27:13',
                'deleted_at' => null,
            ],
            [
                'id' => 2,
                'name' => 'Ketan Bubuk',
                'description' => 'Ketan',
                'status' => 1,
                'created_at' => '2024-08-20 10:27:27',
                'updated_at' => '2024-08-20 10:27:27',
                'deleted_at' => null,
            ],
            [
                'id' => 3,
                'name' => 'Piscok',
                'description' => 'Piscok',
                'status' => 1,
                'created_at' => '2024-08-20 10:27:37',
                'updated_at' => '2024-08-20 10:27:37',
                'deleted_at' => null,
            ],
        ]);
    }
}
