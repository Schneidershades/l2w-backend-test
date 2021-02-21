<?php

namespace Tests\Feature\Quiz;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Quiz;
use App\Models\User;
use App\Models\ClassSchedule;

class QuizSessionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_for_quiz_session()
    {
        $this->withOutExceptionHandling();

        $user = $this->actingAs(User::factory()->create());

        $schedule = ClassSchedule::factory()->create();

        $response = $this->post('api/v1/quiz/start',
            array_merge($this->data(), [
                    'class_schedule_id' => $schedule->id
                ]
            )
        );
        $response->assertStatus(201);
    }

    private function data()
    {
        return  [
        ];
    }
}
