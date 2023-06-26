<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentClassController extends Controller
{
    public function index()
    {
        $studentClasses = StudentClass::all();
        $context = 'studentClass';
        return view('student_classes.index', compact('studentClasses', 'context'));
    }
    
    public function create()
    {
        $studentClasses = StudentClass::all();
        return view('student_classes.create', ['studentClasses' => $studentClasses]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class' => 'required|numeric',
        ], [
            'class.numeric' => 'The :attribute field should contain only numbers.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fill out all required fields.');
        }
    
        StudentClass::create($request->only('class'));
    
        return redirect()->route('student_classes.index')->with('success', 'Student class created successfully');
    }

    public function edit(StudentClass $studentClass)
    {
        return view('student_classes.edit', compact('studentClass'));
    }

    public function update(Request $request, StudentClass $studentClass)
    {
        $request->validate([
            'class' => 'required|numeric',
        ], [
            'class.numeric' => 'The :attribute field should contain only numbers.',
        ]);

        $studentClass->update($request->only('class'));

        return redirect()->route('student_classes.index')->with('success', 'Student class updated successfully');
    }

    public function destroy(StudentClass $studentClass)
    {
        try {
            $studentClass->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->route('student_classes.index')
                    ->with('error', 'Cannot delete the student class because it is associated with students.');
            }
            
            // Handle other query exceptions if needed
            // return a relevant error message or redirect as per your requirements
        }
        
        return redirect()->route('student_classes.index')
            ->with('success', 'Student class deleted successfully.');
    }
}
