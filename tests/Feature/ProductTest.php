<?php

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;

describe('API', function () {
    it('can fetch info of a product with the API "Get Product" route', function () {
        $category = Category::factory()
            ->has(Product::factory()->count(1))
            ->create();

        $product = new ProductResource($category->products->first());
        $response = $this->get(route('api.product.get', ['product' => $product->id]));
        $response->assertStatus(200)->assertJson(['data' => $product->resolve()]);
    });
});
