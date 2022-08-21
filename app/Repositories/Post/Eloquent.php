<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\Language\LanguageRepository;

class Eloquent implements PostRepository
{
    protected $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function get()
    {
        $local = app(LanguageRepository::class)->getLanguage();

        return $this->model->withWhereHas(
            'translation', fn($q) => $q->where('language_id', $local->id),
        )->paginate(10);
    }

    public function store(array $attributes)
    {
        $language = isset($attributes['language_id']) && $attributes['language_id']
            ? $attributes['language_id']
            : app(LanguageRepository::class)->getLanguage()->id;

        $model = clone $this->model;
        $model->save();

        if (isset($attributes['tags_id']) && $attributes['tags_id']) {
            $model->tags()->attach($attributes['tags_id']);
            unset($attributes['tags_id']);
        }

        $attributes['post_id'] = $model->id;
        $attributes['language_id'] = $language;

        $model->translation()->forceCreate($attributes);

        return $model->id;
    }

    public function update(array $attributes, $model)
    {
        $model->tags()->detach();

        if (isset($attributes['tags_id']) && $attributes['tags_id']) {
            $model->tags()->attach($attributes['tags_id']);
            unset($attributes['tags_id']);
        }

        $postTranslation = $this->getData($model->id);
        $postTranslation['translation']->fill($attributes);
        $postTranslation['translation']->save();

        return $model;
    }

    public function destroy($post)
    {
        return $post->delete();
    }

    public function getData($id)
    {
        $local = app(LanguageRepository::class)->getLanguage();

        $post = $this->model->with([
            'translation' => fn($q) => $q->where('language_id', $local->id),
            'translation.language',
            'tags'
        ])->find($id);

        $translation = $post->translation->first();

        return collect([
            'post' => $post,
            'translation' => $translation,
        ]);
    }
}
