<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = Quiz::create([
        	'class_schedule_id' => 1,
        	'question' => '1 Gives you the chance to learn programming',
        	'attempts' => 2,
        ]);

        $class = Quiz::create([
        	'class_schedule_id' => 1,
        	'question' => '2 Gives you the chance to learn programming',
        	'attempts' => 2,
        ]);

        $class = Quiz::create([
        	'class_schedule_id' => 1,
        	'question' => '3 Gives you the chance to learn programming',
        	'attempts' => 2,
        ]);

        $class = Quiz::create([
        	'class_schedule_id' => 1,
        	'question' => '4 Gives you the chance to learn programming',
        	'attempts' => 2,
        ]);

        $class = Quiz::create([
        	'class_schedule_id' => 1,
        	'question' => '5 Gives you the chance to learn programming',
        	'attempts' => 2,
        ]);




        $class = Quiz::create([
            'class_schedule_id' => 2,
            'question' => '1 Gives you the chance to learn programming',
            'attempts' => 2,
        ]);

        $class = Quiz::create([
            'class_schedule_id' => 2,
            'question' => '2 Gives you the chance to learn programming',
            'attempts' => 2,
        ]);

        $class = Quiz::create([
            'class_schedule_id' => 2,
            'question' => '3 Gives you the chance to learn programming',
            'attempts' => 2,
        ]);

        $class = Quiz::create([
            'class_schedule_id' => 2,
            'question' => '4 Gives you the chance to learn programming',
            'attempts' => 2,
        ]);

        $class = Quiz::create([
            'class_schedule_id' => 2,
            'question' => '5 Gives you the chance to learn programming',
            'attempts' => 2,
        ]);



        $class = Quiz::create([
            'class_schedule_id' => 3,
            'question' => '1 Gives you the chance to learn programming',
            'attempts' => 2,
        ]);

        $class = Quiz::create([
            'class_schedule_id' => 3,
            'question' => '2 Gives you the chance to learn programming',
            'attempts' => 2,
        ]);

        $class = Quiz::create([
            'class_schedule_id' => 3,
            'question' => '3 Gives you the chance to learn programming',
            'attempts' => 2,
        ]);

        $class = Quiz::create([
            'class_schedule_id' => 3,
            'question' => '4 Gives you the chance to learn programming',
            'attempts' => 2,
        ]);

        $class = Quiz::create([
            'class_schedule_id' => 3,
            'question' => '5 Gives you the chance to learn programming',
            'attempts' => 2,
        ]);
    }
}
