<!-- Display students -->
<h1>Students</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('students.create') }}" class="btn btn-primary">Create Student</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Class</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
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
            </tr>
        @endforeach
    </tbody>
</table>
