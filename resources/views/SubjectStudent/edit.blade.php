<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Student Subject</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ss.update', $subjectStudent) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="subject_id">Subject:</label>
                <select name="subject_id" id="subject_id" class="form-control">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" @if ($subject->id === $subjectStudent->subject_id) selected @endif>{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="student_id">Student:</label>
                <select name="student_id" id="student_id" class="form-control">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" @if ($student->id === $subjectStudent->student_id) selected @endif>{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>