<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(AnswerSeeder::class);

        $this->call(ConnectQuestionTagSeeder::class);
        $this->call(ConnectQuestionUserSeeder::class);
        $this->call(ConnectAnswerUserSeeder::class);

        $this->call(ConnectAnswersToQuestionsSeeder::class);
        $this->call(CorrectAnswerSeeder::class);
    }
}
