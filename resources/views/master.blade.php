<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <!-- Navigation bar -->
    <nav>
        <!-- Add your navigation content here -->
        @include('search')
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Add your sidebar content here -->
    </div>

    <!-- Main content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Add your JavaScript links here -->
</body>
</html>
