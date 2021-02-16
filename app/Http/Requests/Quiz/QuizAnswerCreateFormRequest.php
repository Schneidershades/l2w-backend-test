<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @OA\Schema(
 *      title="Quiz Answer Create Form Request Fields",
 *      description="Quiz Answer Create Form request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class QuizAnswerCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Quiz Id",
     *      description="Id of the Quiz",
     *      example="1"
     * )
     *
     * @var int
     */
    public $quiz_id;

    /**
     * @OA\Property(
     *      title="Multiple Choice Id",
     *      description="Id of the Multiple Choice",
     *      example="1"
     * )
     *
     * @var int
     */
    public $multiple_choice_id;

    /**
     * @OA\Property(
     *      title="Quiz Session ID",
     *      description="ID Quiz Session",
     *      example="1"
     * )
     *
     * @var int
     */
    public $quiz_session_id;
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'multiple_choice_id' => 'required|int|exists:multiple_choices,id',
            'quiz_id' => 'required|int|exists:quizzes,id',
            'quiz_session_id' => 'required|int|exists:quiz_sessions,id',
        ];
    }
}
