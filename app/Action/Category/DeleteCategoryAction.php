<?php

namespace App\Action\Category;

use App\Models\Category;

class DeleteCategoryAction
{
    public function __invoke(Category $category): void
    {
        $category->delete();
    }
}
