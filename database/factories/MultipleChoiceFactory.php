<?php

namespace Database\Factories;

use App\Models\MultipleChoice;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class MultipleChoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MultipleChoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "quiz_id" => Quiz::factory(),
            "option" => $this->faker->unique()->randomElement([true, false]),
            "correct" => $this->faker->unique()->randomElement([true, false]),
        ];
    }
}
