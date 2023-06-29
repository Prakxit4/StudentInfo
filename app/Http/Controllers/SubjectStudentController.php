<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectStudent;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectStudentController extends Controller
{
    public function index()
    {
        $subjectStudents = SubjectStudent::with('student', 'subject')->get();
        $subjectstudents = SubjectStudent::with('student', 'subject')
            ->select('student_id', 'students.name as student_name', DB::raw('GROUP_CONCAT(subjects.name SEPARATOR ", ") as subjects'))
            ->join('students', 'students.id', '=', 'subject_student.student_id')
            ->join('subjects', 'subjects.id', '=', 'subject_student.subject_id')
            ->groupBy('student_id', 'student_name')
            ->get();
    
        $context = 'subjectstudent';
    
        return view('SubjectStudent.index', compact('subjectstudents', 'context'));
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
            'subject_id' => 'required',
            'student_id' => 'required',
        ]);
    
        $subjectStudent->update($request->all());
    
        return redirect()->route('ss.index')
            ->with('success', 'Subject-Student relationship updated successfully.');
    }
    
    public function destroy(SubjectStudent $subjectStudent)
    {
        $subjectStudent->delete();

        return redirect()->route('ss.index')
            ->with('success', 'Subject-Student relationship deleted successfully.');
    }
}
