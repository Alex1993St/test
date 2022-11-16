<?php

namespace App\Action\Category;

use App\Data\CategoryData;
use App\Models\Category;

class UpdateCategoryAction
{
    public function __invoke(CategoryData $dto): Category
    {
        $dto->model->forceFill([
           'name' => $dto->name
        ])->save();

        return $dto->model;
    }
}
