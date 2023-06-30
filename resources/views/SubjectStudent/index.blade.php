<!-- resources/views/SubjectStudent/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Subject Students</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
@extends('master')

@section('title', 'Subject Students')
@section('content')
    <div class="container mt-5">
    <h1 class="display-4">Subject-Student Relationships</h1>
    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
     @endif
        <a href="{{ route('ss.create') }}" class="btn btn-primary">Create Subject-Student Relationship</a>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Student</th>
                <th>Subjects</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjectStudents as $subjectStudent)
                <tr>
                    <td>{{ $subjectStudent->student->name }}</td>
                    <td>{{ $subjectStudent->subjects }}</td>
                    <td>
                        <a href="{{ route('ss.edit', $subjectStudent->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('ss.destroy', $subjectStudent->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>