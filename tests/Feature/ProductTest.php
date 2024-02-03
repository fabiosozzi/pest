<?php

namespace Tests\Feature;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;

describe('MODEL', function () {
    it('can create a product with associated Category', function () {
        $category = Category::factory()->create();
        $product = Product::factory()->for($category)->create();
        $this->assertDatabaseHas('products', ['id' => $product->id]);
    });
});

describe('API', function () {
    it('can fetch info of a product with the API "Get Product" route', function () {
        $category = Category::factory()->create();
        $product = new ProductResource(Product::factory()->for($category)->create());
        $response = $this->get(route('api.product.get', ['product' => $product->id]));
        $response->assertStatus(200)->assertJson(['data' => $product->resolve()]);
    });
});
