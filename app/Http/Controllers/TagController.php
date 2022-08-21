<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Repositories\Tag\TagRepository;

class TagController extends Controller
{
    protected $model;

    public function __construct(TagRepository $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $tags = $this->model->get();

        return view('tag.index', compact('tags'));
    }

    public function create()
    {
        $tags = $this->model->get();

        return view('tag.create', compact('tags'));
    }

    public function store(StoreTagRequest $request)
    {
        $this->model->store($request->except('_token'));

        return redirect(route('tag.index'));
    }

    public function edit(Tag $tag)
    {
        return view('tag.update', compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $this->model->update($request->except('_token', '_method'), $tag);

        return redirect(route('tag.index'));
    }

    public function destroy(Tag $tag)
    {
        $this->model->destroy($tag);

        return redirect(route('tag.index'));
    }
}
