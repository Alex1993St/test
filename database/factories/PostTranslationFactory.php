<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostTranslationFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->text(),
            'content' => fake()->text(),
            'post_id' => Post::create()->id,
            'language_id' => $this->getLang()
        ];
    }

    private function getLang()
    {
        $model = Language::first();

        if (!$model) {
            $model = Language::factory()->create();
        }

        return $model->id;
    }
}
