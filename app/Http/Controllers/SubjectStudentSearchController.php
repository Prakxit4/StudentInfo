<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectStudent;
use App\Models\Student;

class SubjectStudentSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search logic on the "subject_students" table by joining the "students" table
        $subjectStudents = Student::where('name', 'LIKE', "%{$query}%")->get();

        // Prepare the search results
        $results = [
            'subjectStudents' => $subjectStudents,
        ];

        // Return the search results view with the $results variable
        return view('search.subjectstudent', compact('results'));
    }
}
