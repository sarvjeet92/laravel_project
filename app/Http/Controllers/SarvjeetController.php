<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SarvjeetController extends Controller
{
    function viewQuestionPage()
	{
		return view('LaravelQuestions');
	}
}
