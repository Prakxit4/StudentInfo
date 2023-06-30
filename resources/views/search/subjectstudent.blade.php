<!DOCTYPE html>
<html>
<head>
    <title>Search Results - Subject-Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Add your additional CSS links here -->
</head>
<body>
    <div class="container mt-4">
        <h1>Search Results - Subject-Student</h1>

        @if ($results['subjectStudents']->isEmpty())
            <p>No results found.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Subjects</th>
                        <th>Actions</th>
                        <!-- Add additional subject-student table columns here -->
                    </tr>
                </thead>
                <tbody>
    @foreach ($results['subjectStudents'] as $subjectStudent)
        <tr>
            <td>{{ $subjectStudent->student ? $subjectStudent->student->name : 'N/A' }}</td>
            <td>{{ $subjectStudent->subjects }}</td>
            <td>
                <a href="{{ route('ss.edit', $subjectStudent) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('ss.destroy', $subjectStudent) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            <!-- Add additional subject-student table data here -->
        </tr>
    @endforeach
</tbody>

            </table>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Add your additional JavaScript links here -->
</body>
</html>
