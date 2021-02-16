<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuizAnswer;
    
class QuizAnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = QuizAnswer::create([
        	'quiz_id' => 1,
        	'attempts' => 4,
        	'correct' => 0,
        	'fail' => 2,
        ]);

    }
}