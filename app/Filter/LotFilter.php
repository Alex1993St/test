<?php

namespace App\Filter;

use App\Models\Lot;

class LotFilter
{
    public static function filter($request)
    {
        return Lot::when($request->input('categories'),
            fn($query) => $query->whereHas('categories',
                fn($q) => $q->whereIn('id', $request->input('categories'))
            )
        )->paginate(25);
    }
}
