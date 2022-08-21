<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\Language\LanguageRepository;
use App\Repositories\Post\PostRepository;
use App\Repositories\Tag\TagRepository;


class PostController extends Controller
{
    protected $model;

    public function __construct(PostRepository $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $posts = $this->model->get();

        return view('post.index', compact('posts'));
    }

    public function create(TagRepository $tag, LanguageRepository $language)
    {
        $posts = $this->model->get();
        $tags = $tag->getItem();
        $languages = $language->get();

        return view('post.create', compact('posts', 'tags', 'languages'));
    }

    public function store(StorePostRequest $request)
    {
        $this->model->store($request->except('_token'));

        return redirect(route('post.index'));
    }

    public function edit(Post $post, TagRepository $tag)
    {
        $item = $this->model->getData($post->id);
        $tags = $tag->getItem();

        return view('post.update', compact('item', 'tags'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->model->update($request->except('_token', '_method'), $post);

        return redirect(route('post.index'));
    }

    public function destroy(Post $post)
    {
        $this->model->destroy($post);

        return redirect(route('post.index'));
    }
}
