<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{

    	return View::make('hello');
});

Route::controller('admin', 'AdminController');
Route::controller('questions', 'QuestionsController');
Route::controller('uquestions', 'UQuestionsController');
Route::controller('exams', 'ExamsController');

Route::controller('quiz', 'QuizController');



Route::resource('user', 'UsersController');
Route::resource('session', 'SessionsController');
Route::resource('question', 'QuestionsController');
Route::resource('category', 'CategoriesController');
Route::resource('student', 'StudentsController');
Route::resource('result', 'ResultsController');
Route::resource('uquestion', 'UQuestionsController');
Route::resource('exam', 'ExamsController');


Route::get('/userpanel',[
   
    'as' => 'user.dashboard',
    'uses' => 'UserPanel@dashboard',
    'before' => 'auth'
    
]);