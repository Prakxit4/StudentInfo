<!-- Display subjects -->
<h1>Subjects</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('subjects.create') }}" class="btn btn-primary">Create Subject</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Subject</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->id }}</td>
                <td>{{ $subject->student->name }}</td>
                <td>{{ $subject->subject }}</td>
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
