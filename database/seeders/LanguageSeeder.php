<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * php artisan db:seed --class=LanguageSeeder
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'locale' => 'uk',
                'prefix' => '_uk',
            ], [
                'locale' => 'ru',
                'prefix' => '_ru',
            ], [
                'locale' => 'en',
                'prefix' => '_en',
            ]
        ];

        Language::insert($data);
    }
}
