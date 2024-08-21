<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            ItemsSeeder::class,
            OutletsSeeder::class,
            PricesSeeder::class,
        ]);
//         DB::table('items')->insert([
//            [
//                'id' => 1,
//                'name' => 'Mie Keranjang',
//                'description' => 'Mie Keranjang',
//                'status' => 1,
//                'created_at' => '2024-08-20 10:27:13',
//                'updated_at' => '2024-08-20 10:27:13',
//                'deleted_at' => null,
//            ],
//            [
//                'id' => 2,
//                'name' => 'Ketan Bubuk',
//                'description' => 'Ketan',
//                'status' => 1,
//                'created_at' => '2024-08-20 10:27:27',
//                'updated_at' => '2024-08-20 10:27:27',
//                'deleted_at' => null,
//            ],
//            [
//                'id' => 3,
//                'name' => 'Piscok',
//                'description' => 'Piscok',
//                'status' => 1,
//                'created_at' => '2024-08-20 10:27:37',
//                'updated_at' => '2024-08-20 10:27:37',
//                'deleted_at' => null,
//            ],
//        ]);
//
//        // Seed untuk tabel Outlets
//        DB::table('outlets')->insert([
//            [
//                'id' => 1,
//                'name' => 'Pasar',
//                'description' => 'pasar',
//                'location' => 'Pasar selomartani',
//                'status' => 1,
//                'created_at' => '2024-08-20 10:28:39',
//                'updated_at' => '2024-08-20 10:28:39',
//                'deleted_at' => null,
//            ],
//        ]);
//
//        // Seed untuk tabel Prices
//        DB::table('prices')->insert([
//            [
//                'id' => 1,
//                'outlet_id' => 1,
//                'item_id' => 1,
//                'price' => 1700,
//                'created_at' => '2024-08-20 10:30:33',
//                'updated_at' => '2024-08-20 10:30:33',
//            ],
//            [
//                'id' => 2,
//                'outlet_id' => 1,
//                'item_id' => 2,
//                'price' => 1800,
//                'created_at' => '2024-08-20 10:30:33',
//                'updated_at' => '2024-08-20 10:30:33',
//            ],
//            [
//                'id' => 3,
//                'outlet_id' => 1,
//                'item_id' => 3,
//                'price' => 1700,
//                'created_at' => '2024-08-20 10:30:33',
//                'updated_at' => '2024-08-20 10:30:33',
//            ],
//        ]);
    }
}
