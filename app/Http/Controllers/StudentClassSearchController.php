<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search logic on the "student_classes" table
        $studentClasses = StudentClass::where('class', 'LIKE', "%{$query}%")->get();

        // Prepare the search results
        $results = [
            'studentClasses' => $studentClasses,
        ];
        

        // Return the search results view with the $results variable
        return view('search.studentclass', compact('results'));
    }
}
