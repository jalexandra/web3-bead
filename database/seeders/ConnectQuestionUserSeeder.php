<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class ConnectQuestionUserSeeder extends Seeder
{
    /** @noinspection PhpUnhandledExceptionInspection */
    public function run(): void
    {
        $n = User::count() / 1.5;
        foreach (Question::all() as $question){
            $users = User::sample(random_int(0, $n));
            foreach ($users as $user){
                $question->scoredBy()->attach($user, ['positive' => (bool)random_int(0,1)]);
            }
        }
    }
}
