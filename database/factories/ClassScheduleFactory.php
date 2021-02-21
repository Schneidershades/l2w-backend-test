<?php

namespace Database\Factories;

use App\Models\ClassSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClassSchedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->sentence(1),
            "excerpt" => $this->faker->sentence(5),
            "description" => $this->faker->sentence(30),
        ];
    }
}
