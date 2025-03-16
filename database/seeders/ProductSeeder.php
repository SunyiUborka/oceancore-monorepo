<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'test',
            'description' => 'test',
            'quantity' => 1,
            'price' => 100,
            'image' => 'test.jpg',
            'attributes' => [
                'capacity' => '1TB',
                'interface' => 'NVMe PCIe 4.0',
                'read_speed' => '5000MB/s'
            ]
        ]);

    }
}
