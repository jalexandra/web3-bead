<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class ConnectAnswersToQuestionsSeeder extends Seeder
{
    public function run(): void
    {
        $answers = Answer::all();
        /** @var Answer $answer */
        foreach ($answers as $answer){
            /** @noinspection PhpPossiblePolymorphicInvocationInspection */
            $answer->question_id = Question::random()->id;
            $answer->save();
        }
    }
}
