<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Add your additional CSS links here -->
</head>
<body>
    <div class="container mt-4">
        <h1>Search Results</h1>

        @if ($results['students']->isEmpty() && $results['subjects']->isEmpty() && $results['studentClasses']->isEmpty())
            <p>No results found.</p>
        @else
            @if ($results['students']->isNotEmpty())
                <h2>Students</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <!-- Add additional student table columns here -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results['students'] as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <!-- Add additional student table data here -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            @if ($results['subjects']->isNotEmpty())
                <h2>Subjects</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Subject</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results['subjects'] as $subject)
                            <tr>
                                <td>{{ $subject->id }}</td>
                                <td>{{ $subject->student->name }}</td>
                                <td>{{ $subject->name }}</td>
                                <td>
                                    <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('subjects.destroy', $subject) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            @if ($results['studentClasses']->isNotEmpty())
                <h2>Student Classes</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Class</th>
                            <!-- Add additional student class table columns here -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results['studentClasses'] as $studentClass)
                            <tr>
                                <td>{{ $studentClass->id }}</td>
                                <td>{{ $studentClass->class }}</td>
                                <!-- Add additional student class table data here -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Add your additional JavaScript links here -->
</body>
</html>
