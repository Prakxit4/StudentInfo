<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search logic on the "students" table
        $students = Student::where('name', 'LIKE', "%{$query}%")->get();

        // Prepare the search results
        $results = [
            'students' => $students,
        ];

        // Return the search results view with the $results variable
        return view('search.student', compact('results'));
    }
}
