<?php

namespace App\Actions;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class ReturnProduct
{
    use AsAction;

    public function handle(Product $product)
    {
        return $product;
    }

    public function asController(Product $product)
    {
        return new ProductResource($this->handle($product));
    }
}
