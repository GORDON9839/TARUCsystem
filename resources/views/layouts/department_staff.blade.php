<html>
<head>
    <title>TAR UC Academic</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" >
    <noscript><link rel="stylesheet" href="{{asset('assets/css/noscript.css')}}" /></noscript>
</head>
<body class="is-preload landing">
<div id="page-wrapper">

    <!-- Header -->
    <header id="header">
        <h1 id="logo"><a href="index.php"><img src="images/logo2.png" alt="" /></a></h1>
        <nav id="nav">
            <ul>
                <li><a href="">Home</a></li>
                <li>
                    <a href="programmes">Manage Programme</a>
                    <ul>

                        <li><a href="">Postgraduate Programme</a></li>
                        <li><a href="">Undergraduate Programme</a></li>
                        <li><a href="">Pre-University Programme</a></li>
                        <li>
                            <a href="#">Submenu</a>
                            <ul>
                                <li><a href="#">Option 1</a></li>
                                <li><a href="#">Option 2</a></li>
                                <li><a href="#">Option 3</a></li>
                                <li><a href="#">Option 4</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Campuses</a>
                    <ul>
                        <li><a href="">Postgraduate Programme</a></li>
                        <li><a href="">Undergraduate Programme</a></li>
                        <li><a href="">Pre-University Programme</a></li></li>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </ul>
                </li>
            </ul>

        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</div>
</body>
</html>
