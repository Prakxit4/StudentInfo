<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search logic on the "subjects" table
        $subjects = Subject::where('name', 'LIKE', "%{$query}%")->get();

        // Prepare the search results
        $results = [
            'subjects' => $subjects,
        ];

        // Return the search results view with the $results variable
        return view('search.subject', compact('results'));
    }
}
