<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutletsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed untuk tabel Outlets
        DB::table('outlets')->insert([
            [
                'id' => 1,
                'name' => 'Pasar',
                'description' => 'pasar',
                'location' => 'Pasar selomartani',
                'status' => 1,
                'created_at' => '2024-08-20 10:28:39',
                'updated_at' => '2024-08-20 10:28:39',
                'deleted_at' => null,
            ],
        ]);
    }
}
