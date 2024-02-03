<?php

use Illuminate\View\View;

use function Laravel\Folio\{name, render};

name('category.show');

render(function(View $view) {
    return $view->with('category', $view->category->load('products'));
});

?>

@include('partials.menu')

<div>
    <h1>Scheda categoria</h1>
    <p>Titolo: {{ $category->name }}</p>

    <h2>Prodotti</h2>
    <ul>
        @foreach($category->products as $product)
            <li><a href="{{ route('product.show', ['product' => $product]) }}">{{ $product->name }}</a></li>
        @endforeach
    </ul>
</div>
