<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ConnectQuestionTagSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Question::all() as $question){
            /** @noinspection PhpUnhandledExceptionInspection */
            $tags = Tag::sample(random_int(1, 10));
            foreach ($tags as $tag){
                $question->tags()->attach($tag);
            }
        }
    }
}
