<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <h1>Search Results</h1>

    @if ($results['students']->isEmpty() && $results['subjects']->isEmpty() && $results['classes']->isEmpty())
        <p>No results found.</p>
    @else
        @if (!$results['students']->isEmpty())
            <h2>Students</h2>
            <ul>
                @foreach ($results['students'] as $student)
                    <li>{{ $student->name }}</li>
                @endforeach
            </ul>
        @endif

        @if (!$results['subjects']->isEmpty())
            <h2>Subjects</h2>
            <ul>
                @foreach ($results['subjects'] as $subject)
                    <li>{{ $subject->name }}</li>
                @endforeach
            </ul>
        @endif

        @if (!$results['classes']->isEmpty())
            <h2>Classes</h2>
            <ul>
                @foreach ($results['classes'] as $class)
                    <li>{{ $class->class }}</li>
                @endforeach
            </ul>
        @endif
    @endif

    <!-- Add your JavaScript links here -->
</body>
</html>
