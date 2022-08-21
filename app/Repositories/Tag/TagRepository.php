<?php

namespace App\Repositories\Tag;

interface TagRepository
{
    public function get();

    public function store(array $attributes);

    public function update(array $attributes, $model);

    public function destroy($tag);

    public function getItem();
}
