<?php

namespace App\Action\Lot;

use App\Data\LotData;

class CreateLotAction
{
    public function __invoke(LotData $dto): void
    {
        $model = $dto->model->forceCreate([
            'name' => $dto->name,
            'description' => $dto->description
        ]);

        if ($dto->categories) {
            $model->categories()->detach();
            $model->categories()->attach($dto->categories);
        }
    }
}
