<!-- Edit an existing subject -->
<h1>Edit Subject</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('subjects.update', $subject) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="student_id">Student:</label>
        <select name="student_id" id="student_id" class="form-control">
            @foreach ($students as $student)
                <option value="{{ $student->id }}" @if ($student->id === $subject->student_id) selected @endif>{{ $student->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" class="form-control" value="{{ $subject->subject }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
