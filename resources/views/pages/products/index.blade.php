<?php
    use Illuminate\View\View;
    use App\Models\Product;

    use function Laravel\Folio\render;
    use function Laravel\Folio\name;
    
    name('product.list');

    render(function(View $view) {
        return $view->with('products', Product::with('category')->get());
    });
?>

@extends('layouts.app')

@section('content')
<div>
    <h1>Products:</h1>
    @if (!$products->isEmpty())
        <ul>
            @foreach($products as $product)
            <li><a href="{{ route('product.show', [ 'product' => $product]) }}">{{ $product->name }}</a> <small>category: {{ $product->category->name }}</small></li>
            @endforeach
        </ul>
    @else
        <p>None.</p>
    @endif
</div>
@endsection