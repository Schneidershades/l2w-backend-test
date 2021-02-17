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
        	'option' => 'true',
        	'correct' => false,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 1,
        	'option' => 'false',
        	'correct' => true,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 2,
        	'option' => 'true',
        	'correct' => false,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 2,
        	'option' => 'false',
        	'correct' => true,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 3,
        	'option' => 'true',
        	'correct' => false,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 3,
        	'option' => 'false',
        	'correct' => true,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 4,
        	'option' => 'true',
        	'correct' => false,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 4,
        	'option' => 'false',
        	'correct' => true,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 5,
        	'option' => 'true',
        	'correct' => false,
        ]);

        $class = MultipleChoice::create([
        	'quiz_id' => 5,
        	'option' => 'false',
        	'correct' => true,
        ]);
    }
}
