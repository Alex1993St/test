<?php

namespace App\Data;

use App\Http\Requests\LotRequest;
use App\Models\Lot;

class LotData
{
    public function __construct(
        public string $name,
        public string $description,
        public ?array $categories = null,
        public Lot $model
    ){}

    public static function formRequest(LotRequest $request, ?Lot $lot = null)
    {
        return new self(
            name: $request->input('name'),
            description: $request->input('description'),
            categories: $request->input('categories'),
            model: $lot ?: app(Lot::class)
        );

    }
}
