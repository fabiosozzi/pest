<?php

use App\Models\Category;
use App\Models\Product;

describe('MODEL', function () {
    it('can create a Category with associated Products', function () {
        $category = Category::factory()
            ->has(Product::factory()->count(3))
            ->create();

        expect($category->products->count())->toBe(3);
        $first_product = $category->products->first();
        $this->assertInstanceOf(Product::class, $first_product);
        $this->assertInstanceOf(Category::class, $first_product->category);
        expect($category->id)->toBe($first_product->category->id);
    });
});

describe('API', function () {
    it('can fetch info of a category with the API "Get Category" route', function () {
        $category = Category::factory()->create();
        $response = $this->get(route('api.category.get', ['category' => $category->id]))->assertStatus(200);
        $returnedCategory = $response->getContent();
        expect($returnedCategory)->toBeJson();
        expect($category->toArray())->toEqualCanonicalizing(json_decode($returnedCategory, true));
    });
});
