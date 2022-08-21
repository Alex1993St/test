<?php

namespace App\Repositories\PostTranslation;

use App\Models\PostTranslation;

class Eloquent implements PostTranslationRepository
{
    protected $model;

    public function __construct(PostTranslation $model)
    {
        $this->model = $model;
    }

    public function getByIdAndLang($language, $id)
    {
        return $this->model::where([
            'language_id' => $language,
            'post_id' => $id,
        ])->first();
    }
}
