<?php

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Product;

describe('MODEL', function () {
    it('can create a category with associated Products', function () {
        $category = Category::factory()
            ->has(Product::factory()->count(3))
            ->create();

        expect($category->products->count())->toBe(3);
        expect($category->id)->toBe($category->products->first()->category->id);
    });
});

describe('API', function () {
    it('can fetch info of a category with the API "Get Category" route', function () {
        $category = new CategoryResource(Category::factory()->create());
        $response = $this->get(route('api.category.get', ['category' => $category->id]));
        $response->assertStatus(200)->assertJson(['data' => $category->resolve()]);
    });
});

describe('VIEW', function () {
    it('can see the category name in the list page', function () {
        $categories = Category::factory()->count(5)->create();
        $view = $this->get(route('category.list'));
        $view->assertSee($categories->first()->name);
    });

    it('can see the category name in the detail page', function () {
        $category = Category::factory()->create();
        $view = $this->get(route('category.show', ['category' => $category]));
        $view->assertSee($category->name);
    });
});
