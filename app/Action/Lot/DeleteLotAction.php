<?php

namespace App\Action\Lot;

use App\Models\Lot;

class DeleteLotAction
{
    public function __invoke(Lot $lot): void
    {
        $lot->delete();
    }
}
