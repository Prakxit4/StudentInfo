<!DOCTYPE html>
<html>
<head>
    <title>Student Classes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Display student classes -->
    <div class="container mt-5">
        <h1 class="display-4">Student Classes</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->has('error'))
            <div class="alert alert-danger">
                {{ $errors->first('error') }}
            </div>
        @endif

        <a href="{{ route('student_classes.create') }}" class="btn btn-primary">Create Student Class</a>

        <table class="table mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Class</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentClasses as $studentClass)
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
