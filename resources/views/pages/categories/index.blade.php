<?php

use Illuminate\View\View;
use App\Models\Category;

use function Laravel\Folio\render;
use function Laravel\Folio\name;

name('category.list');

render(function(View $view) {
    return $view->with('categories', Category::all());
});

?>
<div>
    <h1>Categories:</h1>
    @if (!$categories->isEmpty())
        <ul>
            @foreach($categories as $category)
            <li>{{ $category->name }}</li>
            @endforeach
        </ul>
    @else
        <p>None.</p>
    @endif
</div>
