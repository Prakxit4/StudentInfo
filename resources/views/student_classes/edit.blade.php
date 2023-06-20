<!-- Edit an existing student class -->
<h1>Edit Student Class</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('student_classes.update', $studentClass) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="class">Class:</label>
        <input type="text" name="class" id="class" class="form-control" value="{{ $studentClass->class }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
