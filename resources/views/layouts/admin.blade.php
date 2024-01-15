<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard - Fantasy Forge</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="admin-panel" class="d-flex flex-column vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <a class="navbar-brand ml-3">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="{{ route('search.all_users') }}">User List</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="{{ route('admin.inquiries') }}">Contact Requests</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="{{ route('create_item') }}">Create Shop Items</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="{{ route('quest.create') }}">Create Quests</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('faq.edit_faq') }}" class="nav-link"">Edit FAQ</a> 
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto mr-5">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="flex-grow-1">
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
