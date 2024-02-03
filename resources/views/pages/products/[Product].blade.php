<?php

use App\Models\Product;
use Illuminate\View\View;
    use function Laravel\Folio\{render, name};
    
    name('product.show');

    render(function(View $view, Product $product) {
        return $view->with('product', $view->product->load('category'));
    });
?>

@include('partials.menu')

<div>
    <h1>Scheda prodotto</h1>
    <p>Titolo: {{ $product->name }}</p>
    <h2>Categoria</h2>
    <p><a href="{{ route('category.show', [ 'category' => $product->category]) }}">{{ $product->category->name }}</a></p>
</div>