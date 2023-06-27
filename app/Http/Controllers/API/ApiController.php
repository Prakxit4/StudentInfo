<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function index()
    {
        $studentClasses = StudentClass::all();
        return response()->json($studentClasses);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class' => 'required|numeric',
        ], [
            'class.numeric' => 'The :attribute field should contain only numbers.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        $studentClass = StudentClass::create($request->all());

        return response()->json($studentClass, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $studentClass = StudentClass::find($id);

        if (!$studentClass) {
            return response()->json(['error' => 'Resource not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($studentClass);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'class' => 'required|numeric',
        ], [
            'class.numeric' => 'The :attribute field should contain only numbers.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        $studentClass = StudentClass::find($id);

        if (!$studentClass) {
            return response()->json(['error' => 'Resource not found'], Response::HTTP_NOT_FOUND);
        }

        $studentClass->update($request->all());

        return response()->json($studentClass, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $studentClass = StudentClass::find($id);
    
        if (!$studentClass) {
            return response()->json(['error' => 'Resource not found'], Response::HTTP_NOT_FOUND);
        }
    
        $studentClass->delete();
    
        return response()->json(['message' => 'Deleted ID: ' . $id], Response::HTTP_OK);
    }
    
}
