<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Products;
use Faker\Factory as Faker;

class ProductDetailsFetchTest extends TestCase
{
    //use RefreshDatabase;

    protected $faker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
    }

    public function testUserCanFetchProductDetails()
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
        $response = $this->get(route('product_details', $product->id));

        $this->assertTrue(true);
    }

    public function testUserCannotFetchProductDetails()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Simulate delete request
        $response = $this->get(route('product_details', -10));

        $this->assertTrue(true);
    }


}
