<?php

namespace App\Actions\Product;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class ReturnProduct
{
    use AsAction;

    public function handle(Product $product): Product
    {
        return $product;
    }

    public function asController(Product $product): ProductResource
    {
        return new ProductResource($this->handle($product));
    }
}
