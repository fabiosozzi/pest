<?php

namespace App\Actions\Product;

use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Http\Requests\Product\UpdateProductRequest;

class UpdateProduct
{
    use AsAction;

    public function handle(Product $product, array $values): void
    {
        $product->update($values);
        $product->save();
    }

    public function asController(Product $product, UpdateProductRequest $request): void
    {
        $this->handle(
            $product,
            $request->all()
        );
    }
}
