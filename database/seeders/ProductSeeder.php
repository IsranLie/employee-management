<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'id' => Str::uuid(),
                'name' => 'Paracetamol',
                'description' => 'Obat penurun panas dan pereda nyeri',
                'stock' => 100,
                'price' => 1500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Amoxicillin',
                'description' => 'Antibiotik untuk infeksi bakteri',
                'stock' => 50,
                'price' => 2500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Vitamin C',
                'description' => 'Suplemen untuk daya tahan tubuh',
                'stock' => 200,
                'price' => 1000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
