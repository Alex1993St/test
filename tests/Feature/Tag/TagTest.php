<?php

namespace Tag;

use App\Models\Tag;
use Tests\TestCase;
use Faker\Generator as Faker;

class TagTest extends TestCase
{
    public function testGetTagList()
    {
        Tag::factory()->create();
        $response = $this->get(route('tag.index'));
        $response->assertStatus(200);
    }

    public function testUpdateTag()
    {
        $model = Tag::factory()->create();
        $this->patch(route('tag.update', [
            'tag' => $model->id,
            'name' => app(Faker::class)->name
        ]));
        $response = $this->get(route('tag.index'));
        $response->assertDontSee($model->name);
        $response->assertStatus(200);
    }

    public function testDeleteTag()
    {
        $model = Tag::factory()->create();
        $this->delete(route('tag.destroy', ['tag' => $model->id]));
        $response = $this->get(route('tag.index'));
        $response->assertDontSee($model->name);
        $response->assertStatus(200);
    }
}
