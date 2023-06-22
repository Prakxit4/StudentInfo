<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
@extends('master')

@section('title', 'Edit Student')

@section('content')
<!-- Edit an existing student -->
<div class="container mt-5">
    <h1>Edit Student</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('students.update', $student) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}">
    </div>

    <div class="form-group">
        <label for="student_class_id">Class:</label>
        <select name="student_class_id" id="student_class_id" class="form-control">
            @foreach ($studentClasses as $studentClass)
                <option value="{{ $studentClass->id }}" @if ($studentClass->id === $student->student_class_id) selected @endif>{{ $studentClass->class }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>