<?php

namespace App\Repositories\PostTranslation;

interface PostTranslationRepository
{
    public function getByIdAndLang($language, $id);
}
