<?php

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Product;

describe('MODEL', function () {
    it('can create a Category with associated Products', function () {
        $category = Category::factory()
            ->has(Product::factory()->count(3))
            ->create();

        expect($category->products->count())->toBe(3);
        expect($category->id)->toBe($category->products->first()->category->id);
    });
});

describe('API', function () {
    it('can fetch info of a category with the API "Get Category" route', function () {
        $category = new CategoryResource(Category::factory()->create());;
        $response = $this->get(route('api.category.get', ['category' => $category->id]));
        $response->assertStatus(200)->assertJson(['data' => $category->resolve()]);
    });
});
