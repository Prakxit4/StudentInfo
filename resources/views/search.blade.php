@if($context === 'student')
    <form action="{{ route('students.search') }}" method="GET" class="search-form">
        <input type="text" name="query" placeholder="Search students...">
        <button type="submit">Search</button>
    </form>
@elseif($context === 'studentClass')
    <form action="{{ route('search.studentClasses') }}" method="GET" class="search-form">
        <input type="text" name="query" placeholder="Search student classes...">
        <button type="submit">Search</button>
    </form>
@elseif($context === 'subject')
    <form action="{{ route('subjects.search') }}" method="GET" class="search-form">
        <input type="text" name="query" placeholder="Search subjects...">
        <button type="submit">Search</button>
    </form>
@elseif($context === 'subjectstudent')
    <form action="{{ route('subjects.search') }}" method="GET" class="search-form">
        <input type="text" name="query" placeholder="Search subjects...">
        <button type="submit">Search</button>
    </form>
@endif
