<?php

namespace App\Data;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryData
{
    public function __construct(
        public string $name,
        public Category $model
    ){}

    public static function formRequest(CategoryRequest $request, ?Category $category = null)
    {
        return new self(
            name: $request->input('name'),
            model: $category ?: app(Category::class)
        );

    }
}
