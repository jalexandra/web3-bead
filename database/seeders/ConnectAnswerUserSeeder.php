<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Database\Seeder;

class ConnectAnswerUserSeeder extends Seeder
{
    /** @noinspection PhpUnhandledExceptionInspection */
    public function run(): void
    {
        $n = User::count() / 1.5;
        foreach (Answer::all() as $answer){
            $users = User::sample(random_int(0, $n));
            foreach ($users as $user){
                $answer->scoredBy()->attach($user, ['positive' => (bool)random_int(0,1)]);
            }
        }
    }
}
