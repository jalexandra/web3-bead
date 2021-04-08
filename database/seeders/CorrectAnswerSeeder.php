<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class CorrectAnswerSeeder extends Seeder
{
    public function run(): void
    {
        $n = Question::count() / 1.5;
        /** @noinspection PhpUnhandledExceptionInspection */
        $questions = Question::sample(random_int(0, $n));
        /** @var Question $question */
        foreach ($questions as $question){
            /** @noinspection PhpUndefinedFieldInspection */
            $question->answer_id = Answer::random()->id;
            $question->save();
        }
    }
}
