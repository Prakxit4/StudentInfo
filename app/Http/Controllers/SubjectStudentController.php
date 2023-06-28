<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectStudentController extends Controller
{
    public function index()
    {
        $subjectStudents = SubjectStudent::all();
        $context = 'subjectstudent';
        return view('SubjectStudent.index', compact('subjectStudents','context'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $students = Student::all();
        return view('SubjectStudent.create', compact('subjects', 'students'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'student_id' => 'required',
        ]);

        SubjectStudent::create($request->all());

        return redirect()->route('ss.index')
            ->with('success', 'Subject-Student relationship created successfully.');
    }
    public function edit(SubjectStudent $subjectStudent)
    {
        $subjects = Subject::all();
        $students = Student::all();
        return view('SubjectStudent.edit', compact('subjectStudent', 'subjects', 'students'));
    }
    
    public function update(Request $request, SubjectStudent $subjectStudent)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'student_id' => 'required|exists:students,id',
        ]);
    
        $subjectStudent->update($request->all());
    
        return redirect()->route('SubjectStudent.index')
            ->with('success', 'Subject-Student relationship updated successfully.');
    }
    
    public function destroy(SubjectStudent $subjectStudent)
    {
        $subjectStudent->delete();

        return redirect()->route('ss.index')
            ->with('success', 'Subject-Student relationship deleted successfully.');
    }
}
