<?php

namespace Database\Factories;

use App\Models\QuizAnswer;
use App\Models\QuizSession;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizAnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuizAnswer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "quiz_id" => Quiz::factory(),
            "quiz_session_id" => QuizSession::factory(),
            "option" => $this->faker->unique()->randomElement([true, false]),
            "correct" => $this->faker->unique()->randomElement([true, false]),
        ];
    }
}
