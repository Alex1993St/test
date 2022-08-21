<?php

namespace App\Repositories\Post;

interface PostRepository
{
    public function get();

    public function store(array $attributes);

    public function update(array $attributes, $model);

    public function destroy($id);

    public function getData($post);
}
