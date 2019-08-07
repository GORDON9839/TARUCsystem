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
        <h1 id="logo"><a href="user_home"><img src="images/logo2.png" alt="" /></a></h1>
        <nav id="nav">
            <ul>
                        <li>
                            <a href="{{action('userProgrammesController@index')}}">View Programmes</a>
                        </li>

                </li>
                <li>
                    <a href="{{action('userCompareselectController@index')}}">Compare Programmes</a>
                </li>
                <li>

                            <li><a href="login" class="button primary">Staff Login</a></li>



                </li>
            </ul>

        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
            <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
            <li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <ul class="copyright">
            <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </footer>
</div>

</body>
</html>
