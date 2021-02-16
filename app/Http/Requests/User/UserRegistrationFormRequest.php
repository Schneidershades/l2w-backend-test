<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Sign Up Form Request Fields",
 *      description="sign up request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class UserRegistrationFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="User First Name",
     *      description="First name of the user",
     *      example="Schneider"
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *      title="User Other Name",
     *      description="Other name of the user",
     *      example="Komolafe"
     * )
     *
     * @var string
     */
    public $other_name;

    /**
     * @OA\Property(
     *      title="User Last Name",
     *      description="Last name of the user",
     *      example="Busayo"
     * )
     *
     * @var string
     */
    public $last_name;

    /**
     * @OA\Property(
     *      title="User Type",
     *      description="Student/Instructor",
     *      example="Student/Instructor"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *      title="User email",
     *      description="Email of the user",
     *      example="admin@admin.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="User password",
     *      description="Password of the user",
     *      example="password"
     * )
     *
     * @var string
     */
    public $password;

    
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
            'first_name' => 'required|string|max:255',
            'other_name' => 'string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'type' => 'required|string|max:255|in:Instructor,Student',
        ];
    }
}
