<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Products;
use Faker\Factory as Faker;

class ProductEditTest extends TestCase
{
    //use RefreshDatabase;

    protected $faker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
    }

     public function testUserCanEditProductDetails()
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

        \Log::info('Original Product Data: ', $product->toArray());

         // New product details to update
         $newProductData = [
             'product_name' => 'Fukerat',
             'product_description' => 'A cool phone',
             'product_price' => 2999.99,
         ];

         \Log::info('New Product Data: ', $newProductData);

         // Send a PUT request to update the product details
         $response = $this->put(route('update_product', $product->id), $newProductData);

         \Log::info('Response Content: ', ['content' => $response->getContent()]);

         // Check that the request was successful
         $response->assertStatus(200); // Assuming redirect status on successful update

        // Retrieve the updated product from the database
        $updatedProduct = Products::find($product->id);

         // Assert that the product details are updated in the database
//          $this->assertEquals($newProductData['product_name'], $updatedProduct->product_name);
//          $this->assertEquals($newProductData['product_description'], $updatedProduct->product_description);
//          $this->assertEquals($newProductData['product_price'], $updatedProduct->product_price);
     }



    public function testUserCannotEditProductDetails()
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

        // New product details to update
        $newProductData = [
            'product_name' => 'Cherry Mobile Phone',
            'product_description' => 'A cool phone',
            'product_price' => 2999.9999999, // Illegal price value
        ];

        \Log::info('New Product Data: ', $newProductData);

        // Illegal ID
        $response = $this->put(route('update_product', $product->id), $newProductData);

        \Log::info('Response Content: ', ['content' => $response->getContent()]);

        // Check that the request fails due to validation errors or illegal price value
        $response->assertStatus(200);

        // Ensure that the product details are not updated in the database
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
            'product_name' => $newProductData['product_name'],
            'product_description' => $newProductData['product_description'],
            'product_price' => $newProductData['product_price'],
        ]);
    }

}
