<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'product_name' => 'Smartphone XYZ',
                'product_description' => 'A high-end smartphone with a sleek design and powerful features.',
                'product_price' => 799.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Wireless Headphones ABC',
                'product_description' => 'Comfortable and high-quality wireless headphones with noise cancellation.',
                'product_price' => 199.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Gaming Laptop 123',
                'product_description' => 'A powerful gaming laptop with the latest hardware and stunning graphics.',
                'product_price' => 1299.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => '4K Ultra HD TV',
                'product_description' => 'A 55-inch 4K Ultra HD TV with smart features and crystal-clear display.',
                'product_price' => 499.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Bluetooth Speaker',
                'product_description' => 'A portable Bluetooth speaker with excellent sound quality and battery life.',
                'product_price' => 49.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Fitness Tracker',
                'product_description' => 'A stylish fitness tracker with heart rate monitoring and GPS.',
                'product_price' => 99.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Smart Home Hub',
                'product_description' => 'A smart home hub to control all your smart devices from one place.',
                'product_price' => 149.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Electric Kettle',
                'product_description' => 'A fast-boiling electric kettle with temperature control.',
                'product_price' => 39.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Air Purifier',
                'product_description' => 'An efficient air purifier with HEPA filter for clean air.',
                'product_price' => 249.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Robot Vacuum',
                'product_description' => 'A smart robot vacuum cleaner with app control.',
                'product_price' => 399.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Instant Pot',
                'product_description' => 'A versatile multi-cooker for quick and easy meals.',
                'product_price' => 89.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Electric Toothbrush',
                'product_description' => 'An electric toothbrush with multiple brushing modes.',
                'product_price' => 59.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Smart Thermostat',
                'product_description' => 'A smart thermostat to control your home’s temperature remotely.',
                'product_price' => 129.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Noise Cancelling Earbuds',
                'product_description' => 'Compact noise-cancelling earbuds with great sound quality.',
                'product_price' => 149.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Smart Watch',
                'product_description' => 'A stylish smart watch with fitness tracking and notifications.',
                'product_price' => 199.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
