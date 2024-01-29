<?php

namespace App\Actions\Category;

use App\Models\Category;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Http\Requests\Category\UpdateCategoryRequest;

class UpdateCategory
{
    use AsAction;

    public function handle(Category $category, array $values): void
    {
        $category->update($values);
        $category->save();
    }

    public function asController(Category $category, UpdateCategoryRequest $request): void
    {
        $this->handle(
            $category,
            $request->all()
        );
    }
}
