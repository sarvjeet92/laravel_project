<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display the contact form.
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Save the submitted form data.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email',
            'about' => 'required|string|max:255',
        ]);

        Student::create($validatedData);

        return redirect()
            ->route('students.create')
            ->with('success', 'Your form has been submitted successfully.');
    }
}