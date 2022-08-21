<?php

namespace Post;

use App\Models\Post;
use App\Models\PostTranslation;
use Tests\TestCase;
use Faker\Generator as Faker;

class PostTest extends TestCase
{
    public function testGetPostList()
    {
        app(Post::class)->create();
        PostTranslation::factory()->create();
        $response = $this->get(route('post.index'));
        $response->assertStatus(200);
    }

    public function testUpdateTag()
    {
        $model = app(Post::class)->create();
        PostTranslation::factory()->create();
        $this->patch(route('post.update', [
            'post' => $model->id,
            'title' => app(Faker::class)->title,
            'description' => app(Faker::class)->text,
            'content' => app(Faker::class)->text,
        ]));
        $response = $this->get(route('tag.index'));
        $response->assertStatus(200);
    }

    public function testDeleteTag()
    {
        $model = Post::create();
        $this->delete(route('post.destroy', ['post' => $model->id]));
        $response = $this->get(route('post.index'));
        $response->assertStatus(200);
    }
}
