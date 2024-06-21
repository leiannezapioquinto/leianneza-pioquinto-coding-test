<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'product_name' => $this->faker->unique()->name,
        'product_description' => $this->faker->sentence,
        'product_price' => $this->faker->randomFloat(2, 10, 1000),
        'created_at' => now(),
        'updated_at' => now(),
        ];
    }
}
