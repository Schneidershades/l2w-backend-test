<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Quiz Create Form Request Fields",
 *      description="Quiz Create Form request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class QuizCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Class Schedule ID",
     *      description="ID Class Schedule",
     *      example="1"
     * )
     *
     * @var int
     */
    public $class_schedule_id;
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
            'quiz_session_id' => 'required|int|exists:quiz_sessions,id',
            'class_schedule_id' => 'required|int|exists:class_schedules,id',
        ];
    }
}
