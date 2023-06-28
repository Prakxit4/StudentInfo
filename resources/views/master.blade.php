<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Add your additional CSS links here -->
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Student Info Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('student_classes.index') }}">Student Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.index') }}">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subjects.index') }}">Subjects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ss.index') }}">Students with Subjects</a>
                </li>
            </ul>
        </div>
        @include('search')
    </nav>

    <!-- Sidebar -->

    <!-- Main content -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Add your additional JavaScript links here -->
</body>
</html>
