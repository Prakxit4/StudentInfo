<!-- Display student classes -->
<div class="container mt-5">
    <h1>Student Classes</h1>

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

    <a href="{{ route('student_classes.create') }}" class="btn btn-primary">Create Student Class</a>

    <table class="table mt-3">
        <thead>
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
