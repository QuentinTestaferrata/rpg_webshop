<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fantasy Forge</title>


    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="{{ asset('storage/images/FantasyForgeNav.png') }}" alt="Fantasy Forge Logo" style="max-height: 30px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--left Side Of Navbar  -->
                @if(Auth::check())
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('quests.show') }}">Adventures</a>
                        </li>
                    </ul>
                    <!--searchbar -->
                    <form class="d-flex mx-auto" action="{{ route('search.users') }}" method="GET">
                        <input name="query" class="form-control me-2" type="text" placeholder="Look for friends" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Go!</button>
                    </form>
                @endif

                <!--Right Side Of Navbar-->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                                <a class="nav-link">Pouch: {{ Auth::user()->balance }}$</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="inventory">Inventory</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>

                            <!-- User dropdown     -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.show', Auth::user()) }}">
                                        Profile
                                    </a>
                                    @if(Auth::user()->role=='user')
                                        <a class="dropdown-item" href="{{ route('contact.form') }}">
                                            Contact
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('my_quests.show') }}">
                                        My Quests
                                    </a>
                                    <a class="dropdown-item" href="{{ route('faq.faq') }}">
                                        FAQ
                                    </a>
                                    <a class="dropdown-item" href="{{ route('about') }}">
                                        About
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @if(Auth::user()->role=='admin')
                                        <div class="dropdown-divider"></div>
                                        <div class="dropdown-header">Admin Options</div>
                                        <a class="dropdown-item" href="{{ route('search.all_users') }}">
                                            User List
                                        </a>
                                        <a class="dropdown-item" href="{{ route('quest.create') }}">
                                            Create Quests
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.inquiries') }}">
                                            Contact Requests
                                        </a>
                                    @endif
                                    
                                </div>
                            </li>
                        </ul>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-3">
            @yield('content')
        </main>
    </div>
</body>
</html>
