<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SarvjeetController;
use App\Http\Controllers\TheoryController;

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



























































































