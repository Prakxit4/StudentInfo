<!-- Create a new student -->
<h1>Create Student</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="student_class_id">Class:</label>
        <select name="student_class_id" id="student_class_id" class="form-control">
            @foreach ($studentClasses as $studentClass)
                <option value="{{ $studentClass->id }}">{{ $studentClass->class }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
