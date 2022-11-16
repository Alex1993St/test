<?php

namespace App\Action\Category;

use App\Data\CategoryData;

class CreateCategoryAction
{
    public function __invoke(CategoryData $dto): void
    {
        $dto->model->forceCreate([
           'name' => $dto->name
        ]);
    }
}
