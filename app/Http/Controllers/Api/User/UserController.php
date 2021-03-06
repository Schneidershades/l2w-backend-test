<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\UserRegistrationFormRequest;
use App\Http\Requests\User\UserLoginFormRequest;
use App\Http\Requests\User\UserUpdateFormRequest;
use App\Models\User;

class UserController extends Controller
{
     /**
     * @OA\Post(
     *      path="/api/v1/user/register",
     *      operationId="register",
     *      tags={"authentication"},
     *      summary="Sign Up a new user",
     *      description="Returns a newly registered user data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UserRegistrationFormRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful signup",
     *          @OA\MediaType(
     *             mediaType="application/json",
     *         ),
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * )
     */
    public function register(UserRegistrationFormRequest $request)
    {
        $model = new User;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        if(!$token = auth()->attempt($request->only(['email', 'password']))){
            return $this->errorResponse('unauthenticated', 401);
        }

        return $this->respondWithToken($token);
    }

     /**
    * @OA\Post(
    *      path="/api/v1/user/login",
    *      operationId="signIn",
    *      tags={"authentication"},
    *      summary="Sign In a registered user",
    *      description="Returns a newly registered user data",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/UserLoginFormRequest")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    * )
    */
    public function login(UserLoginFormRequest $request)
    {
        if(!$token = auth()->attempt($request->only(['email', 'password']))){
            return $this->authErrorResponse('Could not sign you in with those details', 401);
        }

        return $this->respondWithToken($token);
    }

    /**
    * @OA\Post(
    *      path="/api/v1/user/profile",
    *      operationId="updateUserProfile",
    *      tags={"authentication"},
    *      summary="Profile of a registered user",
    *      description="Profile of a registered user",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/UserUpdateFormRequest")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
    public function updateUser(UserUpdateFormRequest $request){

        $model = User::find(auth()->user()->id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showOne($model);
    }


    /**
    * @OA\Post(
    *      path="/api/v1/user/logout",
    *      operationId="userLogout",
    *      tags={"authentication"},
    *      summary="Logout a registered user",
    *      description="Logout a registered user",
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */

    public function logout()
    {
        auth()->logout();
    }

    /**
    * @OA\Get(
    *      path="/api/v1/user/profile",
    *      operationId="userProfile",
    *      tags={"authentication"},
    *      summary="Profile of a registered user",
    *      description="Profile of a registered user",
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
    public function profile(){
        return $this->showOne(auth()->user(), 201);
    }
}
