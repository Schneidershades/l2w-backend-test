<?php

namespace Database\Factories;

use App\Models\QuizSession;
use App\Models\ClassSchedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizSessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuizSession::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "class_schedule_id" => ClassSchedule::factory(),
            "user_id" => User::factory(),
            "session" => $this->faker->unique(true)->numberBetween(1, 20),
            "scores" => $this->faker->unique(true)->numberBetween(47, 100),
            "end" => $this->faker->randomElement([true, false]),
        ];
    }
}
