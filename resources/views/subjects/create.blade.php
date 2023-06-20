<!-- Create a new subject -->
<h1>Create Subject</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('subjects.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="student_id">Student:</label>
        <select name="student_id" id="student_id" class="form-control">
            @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
