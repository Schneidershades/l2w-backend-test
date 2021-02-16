<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MultipleChoice;

class MultipleChoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = MultipleChoice::create([
        	'quiz_id' => 1,
        	'option' => 'True',
        	'correct' => false,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 1,
        	'option' => 'False',
        	'correct' => true,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 2,
        	'option' => 'True',
        	'correct' => false,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 2,
        	'option' => 'False',
        	'correct' => true,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 3,
        	'option' => 'True',
        	'correct' => false,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 3,
        	'option' => 'False',
        	'correct' => true,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 4,
        	'option' => 'True',
        	'correct' => false,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 4,
        	'option' => 'False',
        	'correct' => true,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 5,
        	'option' => 'True',
        	'correct' => false,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 5,
        	'option' => 'False',
        	'correct' => true,
        ]);
    }
}
