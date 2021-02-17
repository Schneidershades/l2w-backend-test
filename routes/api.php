<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::group(['prefix' => 'user', 'namespace' => 'Api\User'], function(){
		Route::post('register', 'UserController@register');
    	Route::post('login', 'UserController@login');
    	Route::post('logout', 'UserController@logout');
        Route::get('profile', 'UserController@profile');
        Route::put('update', 'UserController@update');
	});

	Route::group(['prefix' => 'quiz', 'namespace' => 'Api\Quiz'], function(){
		Route::post('answer', 'QuizAnswerController@store');
    	Route::post('question', 'QuizController@store');
    	Route::post('start', 'QuizSessionController@store');
	});
	Route::get('/class', 'Api\Schedule\ClassScheduleController@index');
});

