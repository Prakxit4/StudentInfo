<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Subject;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $table = $request->input('table'); // Added table name input

        // Perform search logic based on the selected table
        switch ($table) {
            case 'students':
                $results = $this->searchStudents($query);
                break;
            case 'subjects':
                $results = $this->searchSubjects($query);
                break;
            case 'student_classes':
                $results = $this->searchStudentClasses($query);
                break;
            default:
                $results = collect(); // Empty collection if no table is selected
                break;
        }

         // Ensure 'students', 'subjects', and 'studentClasses' keys are always present in the $results array
        $results['students'] = $results['students'] ?? collect();
        $results['subjects'] = $results['subjects'] ?? collect();
        $results['studentClasses'] = $results['studentClasses'] ?? collect();
        // Return the search results view with the $results variable and the selected table
        return view('search.results', compact('results', 'table'));
    }

    private function searchStudents($query)
    {
        return Student::where('name', 'LIKE', "%{$query}%")->get();
    }

    private function searchSubjects($query)
    {
        return Subject::where('name', 'LIKE', "%{$query}%")->get();
    }

    private function searchStudentClasses($query)
    {
        return StudentClass::where('class', 'LIKE', "%{$query}%")->get();
    }
}
