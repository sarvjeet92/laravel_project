<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SarvjeetController;
use App\Http\Controllers\TheoryController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\StudentController;


//Route::get('/', function () {
 //   return view('welcome');
//});

Route::get('sarvjeet', function () {
    return view('New_Page');
});

Route::get('questions', function () {
    return view('LaravelQuestions');
});

Route::get('Q', [SarvjeetController::class,'viewQuestionPage']);

Route::get('theory', function () {
    return view('theory');
});

Route::get('name-theory', [TheoryController::class,'viewTheoryPage']);

Route::get('api-data/{name}', [ApiController::class,'viewTheoryPage']);

Route::get('user/{name}', function($name){
	return view('api-data', array('name' => $name)); //direct return
	});
	
Route::get('/contact', [StudentController::class, 'create'])
    ->name('students.create');

Route::post('/contact', [StudentController::class, 'store'])
    ->name('students.store');
	
Route::get('form-flow', [TheoryController::class,'contactFormFlow']);

Route::get('mid', function () {
    return view('mid');
});































































































