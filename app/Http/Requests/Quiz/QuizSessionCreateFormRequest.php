<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Quiz Session Create Form Request Fields",
 *      description="Quiz Session Create request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class QuizSessionCreateFormRequest extends FormRequest
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
            'class_schedule_id' => 'required|int|exists:class_schedules,id',
        ];
    }
}
