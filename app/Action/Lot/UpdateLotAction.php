<?php

namespace App\Action\Lot;

use App\Data\LotData;
use App\Models\Lot;

class UpdateLotAction
{
    public function __invoke(LotData $dto): Lot
    {
        $dto->model->forceFill([
            'name' => $dto->name,
            'description' => $dto->description
        ])->save();

        if ($dto->categories) {
            $dto->model->categories()->detach();
            $dto->model->categories()->attach($dto->categories);
        }

        return $dto->model;
    }
}
