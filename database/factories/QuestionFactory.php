<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition(): array
    {
        /** @noinspection PhpUndefinedFieldInspection */
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph($this->faker->numberBetween(3, 15)),
            'score' => $this->faker->boolean(70) ? $this->faker->numberBetween(1, 100) : 0,
            'views' => $this->faker->boolean(70) ? $this->faker->numberBetween(1, 100) : 0,
            'owner_id' => User::random()->id,
        ];
    }
}
