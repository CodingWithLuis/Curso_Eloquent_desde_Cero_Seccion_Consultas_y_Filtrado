<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Producto 1',
                'code' => '0001',
                'price' => '10',
            ],
            [
                'name' => 'Producto 2',
                'code' => '0002',
                'price' => '20',
            ],
            [
                'name' => 'Producto 3',
                'code' => '0003',
                'price' => '30',
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
