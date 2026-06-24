<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TheoryController extends Controller
{
    function viewTheoryPage()
	{
		return view('theory');
	}
	
	function contactFormFlow()
	{
		return view('formtheory');
	}
}