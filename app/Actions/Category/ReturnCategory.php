<?php

namespace App\Actions\Category;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Lorisleiva\Actions\Concerns\AsAction;

class ReturnCategory
{
    use AsAction;

    public function handle(Category $category)
    {
        return $category;
    }

    public function asController(Category $category)
    {
        return new CategoryResource($this->handle($category));
    }
}
