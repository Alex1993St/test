<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LanguageFactory extends Factory
{
    public function definition()
    {
        return [
            'locale' => 'uk',
            'prefix' => '_uk',
        ];
    }
}
