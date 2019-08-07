<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>No Sidebar - Landed by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" >
    <noscript><link rel="stylesheet" href="{{asset('assets/css/noscript.css')}}" /></noscript>
</head>
<body class="is-preload">
<div id="page-wrapper">

    <!-- Header -->
    <header id="header">
        <h1 id="logo"><a href="user_home"><img src="{{asset('images/logo2.png')}}"/></a></h1>
        <nav id="nav">
            <ul>
                <li>
                    <a href="{{action('userProgrammesController@index')}}">View Programmes</a>
                </li>
                <li>
                    <a href="{{action('userCompareselectController@index')}}">Compare Programmes</a>
                </li>
                <li><a href="login" class="button primary">Staff Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main -->
    <div id="main" class="wrapper style1">

        <div class="container">
            <h2 style="text-align: center">Shortlist / Search</h2>

            <!-- Content -->
            <section id="content">
                @csrf
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif

                <form action="{{action('userProgrammesController@index')}}" method="post">
                    @csrf
                    {{--shortlist filter part--}}

                    <div style="text-align: center">
                    {{--faculty dropdown--}}
                    <div style="width: 20%; display: inline-block">
                        <label for="faculty" style="display: initial; text-align: left">Faculty</label>
                        <select id="dropdownfaculty" name="faculty" style="width: 90%;">
                            <option value="Any">Any</option>
                            {{--get xml data required for options in dropdown lists--}}
                            <?php $xmlfac = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/userFaculty.xml") or die("No reults found.");
                            foreach($xmlfac as $fac){
                            $facattr = $fac->attributes();
                            ?>
                            <option value="<?php echo $facattr['faculty_id'];?>"><?php echo $fac->faculty_name;?></option>
                            <?php } ?>
                        </select>
                    </div>

                    {{--level of study dropdown--}}
                    <div style="width: 20%; display: inline-block">
                        <label for="level_of_study" style="display: initial">Level of Study</label>
                        <select id="dropdownlevel_of_study" name="level_of_study" style="width: 90%">
                            <option value="Any">Any</option>
                            {{--get xml data required for options in dropdown lists--}}
                            <?php $xmllevos = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/userLevelOfStudy.xml") or die("No reults found.");
                            foreach($xmllevos as $levos){
                            $levosattr = $levos->attributes();
                            ?>
                            <option value="<?php echo $levosattr['level_of_study_id'];?>"><?php echo $levos->level_of_study_name;?></option>
                            <?php } ?>
                        </select>
                    </div>

                    {{--campus dropdown--}}
                    <div style="width: 20%; display: inline-block">
                        <label for="campus" style="display: initial">Campus</label>
                        <select id="dropdowncampus" name="campus" style="width: 90%">
                            <option value="Any">Any</option>
                            {{--get xml data required for options in dropdown lists--}}
                            <?php $xmlcam = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/userCampus.xml") or die("No reults found.");
                            foreach($xmlcam as $cam){
                            $camattr = $cam->attributes();
                            ?>
                            <option value="<?php echo $camattr['campus_id'];?>"><?php echo $cam->campus_name;?></option>
                            <?php } ?>
                        </select>
                    </div>

                    {{--shortlist button--}}
                    <div style="width: 20%; display: inline-block">
                        <input type="submit" value="Shortlist">
                    </div>
                    </div>
                </form>

                <p style="text-align: center">OR</p>


                <form action="{{action('userProgrammesController@index')}}" method="post">
                    @csrf
                    {{--search part--}}

                    <div style="text-align: center">
                    {{--search bar--}}
                    <div style="width: 60%; display: inline-block">
                        <label for="faculty" style="display: initial">Search within Programme names</label>
                        <input type="text" name="search" width="10%"/>
                    </div>

                    {{--search button--}}
                    <div style="width: 20%; display: inline-block">
                        <input type="submit" value="Search">
                    </div>
                    </div>
                </form>

                <br/>
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
