<?php

namespace App\Repositories\Language;

use App\Models\Language;

class Eloquent implements LanguageRepository
{
    protected $model;

    public function __construct(Language $model)
    {
        $this->model = $model;
    }

    public function get()
    {
        return $this->model->get();
    }

    public function getLanguage()
    {
        return $this->model->where('locale', \App::getLocale())->first();
    }
}
