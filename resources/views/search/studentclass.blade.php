<!DOCTYPE html>
<html>
<head>
    <title>Search Results - Student Classes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Add your additional CSS links here -->
</head>
<body>
    <div class="container mt-4">
        <h1>Search Results - Student Classes</h1>

        @if ($results['studentClasses']->isEmpty())
            <p>No results found.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Class</th>
                        <th>Actions</th>
                        <!-- Add additional student class table columns here -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results['studentClasses'] as $studentClass)
                        <tr>
                            <td>{{ $studentClass->id }}</td>
                            <td>{{ $studentClass->class }}</td>
                            <td>
                                <a href="{{ route('student_classes.edit', $studentClass) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('student_classes.destroy', $studentClass) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <!-- Add additional student class table data here -->
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
