<?php

use App\Models\Category;
use App\Models\Product;

describe('API', function () {
    it('can fetch info of a product with the API "Get Product" route', function () {
        $category = Category::factory()
            ->has(Product::factory()->count(1))
            ->create();

        $product = $category->products->first();
        $response = $this->get(route('api.product.get', ['product' => $product->id]));
        expect($product->toArray())->toEqualCanonicalizing($response->json());
    });
});
