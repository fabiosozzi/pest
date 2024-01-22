<?php

use App\Models\Product;
use App\Models\Category;

describe('API', function() {
    it('can fetch info of a product with the API "Get Product" route', function() {
        $category = Category::factory()
            ->has(Product::factory()->count(1))
            ->create();

        $product = $category->products->first();
        $response = $this->get(route('api.product.get', [ 'product' => $product->id]));
        $returnedProduct = $response->getContent();
        expect($returnedProduct)->toBeJson();
        expect($product->toArray())->toEqualCanonicalizing(json_decode($returnedProduct, true));
    });
});

