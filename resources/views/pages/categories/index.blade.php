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

@include('partials.menu')

<div>
    <h1>Categories:</h1>
    @if (!$categories->isEmpty())
        <ul>
            @foreach($categories as $category)
            <li><a href="{{ route('category.show', [ 'category' => $category]) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>None.</p>
    @endif
</div>
