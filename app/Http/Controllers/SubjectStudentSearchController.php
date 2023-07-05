<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectStudent;
use App\Models\Student;

class SubjectStudentSearchController extends Controller
{
    public function search(Request $request)
{
    $searchQuery = $request->input('query');

    // Perform search logic on the "students" table
    $students = Student::where('name', 'LIKE', "%{$searchQuery}%")->get();

    // Get the subject-student relationships for the matched students
    $subjectStudents = SubjectStudent::whereIn('student_id', $students->pluck('id'))->with('student', 'subject')->get();

    // Prepare the search results
    $results = [
        'subjectStudents' => 'subjectstudents',
    ];

    // Return the search results view with the $results variable
    return view('search.subjectstudent', compact('results'));
}  
}
