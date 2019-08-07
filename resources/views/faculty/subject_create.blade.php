<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>TARUC Education System</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" >
    <noscript><link rel="stylesheet" href="{{asset('assets/css/noscript.css')}}" /></noscript>
</head>
<body class="is-preload">
<div id="page-wrapper">

    <!-- Header -->
    <header id="header">
        <h1 id="logo"><a href="index.php"><img src="{{asset('images/logo2.png')}}"/></a></h1>
        <nav id="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>
                    <a href="#">Manage Programme</a>
                    <ul>
                        <li><a href="{{action('programmesController@create')}}">Create New Programme</a></li>
                        <li><a href="{{action('programmesController@index')}}">View Programmes</a></li>
                        <li><a href="{{action('structuresController@create')}}">Create Programme Structure</a></li>
                        <li><a href="{{action('structuresController@index')}}">View Programmes Structure</a></li>
                        <li><a href="{{action('allstructureController@index')}}">View All Programmes Details</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#">Manage Subjects</a>
                    <ul>
                        <li><a href="{{action('subjectsController@create')}}">Create New Subject</a></li>
                        <li><a href="{{action('subjectsController@index')}}">View Subjects</a></li>
                    </ul>

                </li>

                <li>
                    <a href="#">Manage Campuses Offered</a>
                    <ul>
                        <li><a href="{{action('programme_listsController@create')}}">Add New Programmes Offered</a></li>
                        <li><a href="{{action('programme_listsController@index')}}">View Programmes Offered</a></li>
                        <li><a href="{{action('campusesController@index')}}">Add New Campus</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#">Manage Professional Curriculum</a>
                    <ul>
                        <li><a href="{{action('curriculumsController@create')}}">Create New Curriculum</a></li>
                        <li><a href="{{action('curriculumsController@index')}}">View Curriculum</a></li>
                    </ul>

                </li>
                <li><a href="#" class="button primary">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Create New Subject</h2>

            </header>

            <!-- Content -->
            <section id="content">
                <form method="post" action="{{url('subject')}}">
                    @csrf
                    {{ method_field('PUT') }}

                        @if(\Session::has('success'))
                            <div class="alert alert-success">
                    <p> {{\Session::get('success')}}</p></div><br/>
                        @endif
                        <label for="subject_name">Subject Name</label>
                        <input type="text"  name="subject_name" required autofocus/><br/>
                        <label for="subject_code">Subject Code</label>
                        <input type="text"  name="subject_code" required autofocus/><br/>
                        <label for="credit_hours">Credit Hours</label>
                        <input type="number" name="credit_hour" min="1" max="10" required/><br/>



                    </p>
                    <input type="submit" value="Submit" class="primary"/>
                </form>
            </section>

        </div>
    </div>

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


<!-- Scripts -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrolly.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dropotron.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrollex.min.js')}}"></script>
<script src="{{asset('assets/js/browser.min.js')}}"></script>
<script src="{{asset('assets/js/breakpoints.min.js')}}"></script>
<script src="{{asset('assets/js/util.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>
