<!-- Create a new student class -->
<h1>Create Student Class</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('student_classes.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="class">Class:</label>
        <input type="text" name="class" id="class" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
