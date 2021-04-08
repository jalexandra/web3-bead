<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    protected $model = Answer::class;

    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence(10, true),
            'score' => $this->faker->boolean(70) ? $this->faker->numberBetween(1, 100) : 0,
        ];
    }
}
