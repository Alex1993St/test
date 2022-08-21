<?php

namespace App\Repositories\Tag;

use App\Models\Tag;

class Eloquent implements TagRepository
{
    protected $model;

    public function __construct(Tag $model)
    {
        $this->model = $model;
    }

    public function get()
    {
        return $this->model->paginate(20);
    }

    public function store(array $attributes)
    {
        $model = clone $this->model;
        $model->create($attributes);

        return $model->id;
    }

    public function update(array $attributes, $model)
    {
        $model->fill($attributes);
        $model->save();

        return $model;
    }

    public function destroy($tag)
    {
        return $tag->delete();
    }

    public function getItem()
    {
        return $this->model->get();
    }
}
