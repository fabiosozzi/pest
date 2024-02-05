<?php

namespace Tests\Feature;

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

    it('can update a product with the API "Update Product" route', function () {
        $category = Category::factory()->create();
        $product = Product::factory()->for($category, 'category')->create();
        $new_product_name = 'New Product name';
        $response = $this->post(route('api.product.update', ['product' => $product]), ['name' => $new_product_name]);
        $response->assertStatus(200);
        $product_db = Product::find($product->id);
        expect($product_db->name)->toBe($new_product_name);
    });
});
