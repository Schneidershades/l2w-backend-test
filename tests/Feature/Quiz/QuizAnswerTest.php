<?php

namespace Tests\Feature\Quiz;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Quiz;
use App\Models\QuizSession;
use App\Models\MultipleChoice;

class QuizAnswerTest extends TestCase
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
        $quiz = Quiz::factory()->create();
        $session = QuizSession::factory()->create();
        $multipleChoice = MultipleChoice::factory()->create();

        // dd($quiz, $session, $multipleChoice);

        $response = $this->post('api/v1/quiz/answer',
            array_merge($this->data(), [
                    'quiz_id' => $quiz->id,
                    'quiz_session_id' => $session->id,
                    'multiple_choice_id' => $multipleChoice->id,
                ]
            )
        );

        $response->assertOk();
        $response->assertStatus(200);
    }

    private function data()
    {
        return[
        ];
    }
}
