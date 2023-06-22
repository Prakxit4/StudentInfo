<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $studentClasses = StudentClass::all();
        return view('students.create', compact('studentClasses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'student_class_id' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        $studentClasses = StudentClass::all();
        return view('students.edit', compact('student', 'studentClasses'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'student_class_id' => 'required',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        try {
            $student->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->route('students.index')
                    ->with('error', 'Cannot delete the student because it is associated with subjects.');
            }
    
            // Handle other query exceptions if needed
            // return a relevant error message or redirect as per your requirements
        }
    
        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
