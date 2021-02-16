<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassSchedule;

class ClassScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = ClassSchedule::create([
        	'name' => 'Learn Programming',
        	'excerpt' => 'Gives you the chance to learn programming',
        	'description' => 'Gives you the chance to learn programming',
        	'duration' => 10000,
        	'duration' => 10000,
        ]);

        $class = ClassSchedule::create([
        	'name' => 'Learn Math',
        	'excerpt' => 'Gives you the chance to learn Math',
        	'description' => 'Gives you the chance to learn Math',
        	'duration' => 10000,
        	'duration' => 10000,
        ]);

        $class = ClassSchedule::create([
        	'name' => 'Learn English',
        	'excerpt' => 'Gives you the chance to learn English',
        	'description' => 'Gives you the chance to learn English',
        	'duration' => 10000,
        	'duration' => 10000,
        ]);

        $class = ClassSchedule::create([
        	'name' => 'Learn Biology',
        	'excerpt' => 'Gives you the chance to learn Biology',
        	'description' => 'Gives you the chance to learn Biology',
        	'duration' => 10000,
        	'duration' => 10000,
        ]);

        $class = ClassSchedule::create([
        	'name' => 'Learn French',
        	'excerpt' => 'Gives you the chance to learn French',
        	'description' => 'Gives you the chance to learn French',
        	'duration' => 10000,
        	'duration' => 10000,
        ]);
    }
}
