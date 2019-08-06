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

                <h2>Programme Details</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <div class="row">
                    <div class="col-6 col-12-xsmall">

                            <ul class="alt">
                                <table></tr>
                                    <tr><td align="center">Programme Code</td><td> {{$programmes->programme_code}}</td></tr>
                                    <tr><td align="center">Programme Name</td><td>{{$programmes->programme_name}}</td></tr>
                                    <tr><td align="center">Programme Description</td><td> {{$programmes->programme_desc}}</td></tr>
                                    <tr><td align="center">Duration(Full Time)</td><td> {{$programmes->fulltime_duration}}</td></tr>
                                    <tr><td align="center">Duration(Part Time)</td><td> {{$programmes->parttime_duration}}</td></tr>
                                    <tr><td align="center">Faculty </td><td> {{$facultyname->faculty_name}}</td></tr>
                                    <tr><td align="center">Professional Certification</td><td> {{$programmes->professional_certification}}</td></tr>
                                    <tr><td align="center">Minimmum Entry Requirement (SPM)</td><td> {{$programmes->MER_SPM}}</td></tr>
                                    <tr><td align="center">Minimmum Entry Requirement (STPM)</td><td> {{$programmes->MER_STPM}}</td></tr>
                                    <tr><td align="center">Minimmum Entry Requirement (UEC)</td><td> {{$programmes->MER_UEC}}</td></tr>
                                    <tr><td align="center">Minimmum Entry Requirement Description  </td><td> {{$programmes->MER_desc}}</td></tr>
                                    <tr><td align="center">Incorporate Professional Curriculum </td><td>{{$curriculum->curriculum_name}}</td></tr>
                                    <tr><td align="center">Level Of Studies </td><td> {{$level->level_of_study_name}}</td></tr>
                                    <tr><td align="center">

                                        <a href="{{action('programmesController@edit',$programmes->programme_id)}}" class="button primary">Modify</a>
                                        </td><td align="center">
                                            <form action="{{action('programmesController@destroy',$programmes->programme_id)}}" method="post">
                                                @csrf
                                                {{method_field('delete')}}
                                            <input type="submit" value="Delete" onclick="return confirm('Are you sure to delete?')" class="button"></a>
                                            </form>
                                </td></tr>
                                </table>
                            </ul>
                            <!--                </xsl:if>-->

                    </div>
                </div>
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
