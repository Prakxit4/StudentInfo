<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function index()
    {
        $studentClasses = StudentClass::all();
        return view('student_classes.index', compact('studentClasses'));
    }

    public function create()
    {
        $studentClasses = StudentClass::all();
        return view('student_classes.create', ['studentClasses' => $studentClasses]);
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required',
        ]);
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
            'class' => 'required',
        ]);

        $studentClass->update($request->only('class'));

        return redirect()->route('student_classes.index')->with('success', 'Student class updated successfully');
    }

   public function destroy(StudentClass $studentClass)
   {
           $studentClass->delete();
           
       return redirect()->route('student_classes.index')
           ->with('success', 'Student class deleted successfully.');
   }
   
}
