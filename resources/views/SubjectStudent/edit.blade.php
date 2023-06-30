<!-- resources/views/SubjectStudent/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Subject Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
    <h1 class="display-4">Edit Subject-Student Relationship</h1>
    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <form action="{{ route('ss.update', $subjectStudent->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="student_id">Student:</label>
            <select name="student_id" id="student_id" class="form-control">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" @if ($student->id === $subjectStudent->student_id) selected @endif>{{ $student->name }}</option>
                @endforeach
            </select>
            @error('student_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="subject_id">Subject:</label>
            <select name="subject_id" id="subject_id" class="form-control">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" @if ($subject->id === $subjectStudent->subject_id) selected @endif>{{ $subject->name }}</option>
                @endforeach
            </select>
            @error('subject_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
