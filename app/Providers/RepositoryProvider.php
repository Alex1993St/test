<?php

namespace App\Providers;

use App\Repositories\Language\LanguageRepository;
use App\Repositories\Post\PostRepository;
use App\Repositories\PostTranslation\PostTranslationRepository;
use App\Repositories\Tag\TagRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind(PostRepository::class, \App\Repositories\Post\Eloquent::class);
        $this->app->bind(TagRepository::class, \App\Repositories\Tag\Eloquent::class);
        $this->app->bind(LanguageRepository::class, \App\Repositories\Language\Eloquent::class);
        $this->app->bind(PostTranslationRepository::class, \App\Repositories\PostTranslation\Eloquent::class);
    }
}
