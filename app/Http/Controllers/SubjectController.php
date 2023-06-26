<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $context = 'subject';
        return view('subjects.index', compact('subjects', 'context'));
    }



    public function create()
    {
        $students = Student::all();
        return view('subjects.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[A-Za-z\s]+$/',
            'student_id' => 'required',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')
            ->with('success', 'Subject created successfully.');
    }

    public function edit(Subject $subject)
    {
        $students = Student::all();
        return view('subjects.edit', compact('subject', 'students'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|regex:/^[A-Za-z\s]+$/',
            'student_id' => 'required',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')
            ->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Subject deleted successfully.');
    }
}
