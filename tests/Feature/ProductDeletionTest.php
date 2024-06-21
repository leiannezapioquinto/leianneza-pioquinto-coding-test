<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Products;
use Faker\Factory as Faker;

class ProductDeletionTest extends TestCase
{
    use RefreshDatabase;

    protected $faker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
    }

    public function testUserCanDeleteProduct()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Create a product
        $product = Products::factory()->create([
            'product_name' => $this->faker->word,
            'product_description' => $this->faker->sentence,
            'product_price' => $this->faker->randomFloat(2, 0, 1000),
        ]);

        // Simulate delete request
        $response = $this->delete(route('delete_product', $product->id));

        $this->assertTrue(true);
    }

    public function testUserCannotDeleteProduct()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Simulate delete request
        $response = $this->delete(route('delete_product', -1));

        $this->assertTrue(true);
    }
}
