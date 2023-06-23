<!DOCTYPE html>
<html>
<head>
    <title>Search Results - Students</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Add your additional CSS links here -->
</head>
<body>
    <div class="container mt-4">
        <h1>Search Results - Students</h1>

        @if ($results['students']->isEmpty())
            <p>No results found.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Actions</th>
                        <!-- Add additional student table columns here -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results['students'] as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->studentClass->class }}</td>
                            <td>
                                <a href="{{ route('students.edit', $student) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <!-- Add additional student table data here -->
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
