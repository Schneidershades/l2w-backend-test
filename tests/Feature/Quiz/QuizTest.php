<?php

namespace Tests\Feature\Quiz;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\QuizSession;
use App\Models\User;
use App\Models\ClassSchedule;

class QuizTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_for_quiz_question()
    {
        $this->withOutExceptionHandling();

        $user = $this->actingAs(User::factory()->make());

        $session = QuizSession::factory()->create();
        $schedule = ClassSchedule::factory()->create();

        $response = $this->post('api/v1/quiz/question',
            array_merge($this->data(), [
                    'quiz_session_id' => $session->id,
                    'class_schedule_id' => $schedule->id,
                ]
            )
        );

        $response->assertStatus(200);
    }

    private function data()
    {
        return  [
        ];
    }
}
