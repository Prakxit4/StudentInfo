<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\StudentClass;
use Illuminate\Support\Collection;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search logic
        $students = Student::where('name', 'LIKE', "%{$query}%")->get();
        $subjects = Subject::where('name', 'LIKE', "%{$query}%")->get();
        $classes = StudentClass::where('class', 'LIKE', "%{$query}%")->get();

        // Prepare the search results
        $results = [
            'students' => $students,
            'subjects' => $subjects,
            'classes' => $classes,
        ];

        // Return the search results view with the $results variable
        return view('search.results', compact('results'));
    }
}
