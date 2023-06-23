<!DOCTYPE html>
<html>
<head>
    <title>Search Results - Subjects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Add your additional CSS links here -->
</head>
<body>
    <div class="container mt-4">
        <h1>Search Results - Subjects</h1>

        @if ($results['subjects']->isEmpty())
            <p>No results found.</p>
        @else
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Add your additional JavaScript links here -->
</body>
</html>
