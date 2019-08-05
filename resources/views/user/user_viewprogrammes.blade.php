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
        <h1 id="logo"><a href="index.php"><img src="{{asset('images/logo2.png')}}"/></a></h1>
        <nav id="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>
                    <a href="#">Programme Offered</a>
                    <ul>
                        <li><a href="">Postgraduate Programme</a></li>
                        <li><a href="">Undergraduate Programme</a></li>
                        <li><a href="">Pre-University Programme</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Campuses</a>
                    <ul>
                        <li><a href="">Kuala Lumpur Main Campus</a></li>
                        <li><a href="">Penang Branch Campus</a></li>
                        <li><a href="">Perak Branch Campus</a></li>
                        <li><a href="">Johor Branch Campus</a></li>
                        <li><a href="">Pahang Branch</a></li>
                        <li><a href="">Sabah Branch</a></li>
                    </ul>
                </li>
                <li><a href="#" class="button primary">Staff Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main -->
    <div id="main" class="wrapper style1">

        <div class="container">
                <h2 style="text-align: center">Programme List</h2>

            <!-- Content -->
            <section id="content">
                @csrf
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif

                {{--shortlist filter part--}}
                <h3>Shortlist by:</h3>

                {{--faculty dropdown--}}
                <div style="width: 270px; display: inline-block">
                <label for="faculty" style="display: initial">Faculty</label>
                <select id="dropdownfaculty" name="faculty" style="width: 250px;">
                    <option value="any">Any</option>
                    {{--get xml data required for options in dropdown lists--}}
                    <?php $xmlfac = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/userFaculty.xml") or die("Failed to load");
                    foreach($xmlfac as $fac){
                    $facattr = $fac->attributes();
                    ?>
                    <option value="<?php echo $facattr['faculty_id'];?>"><?php echo $fac->faculty_name;?></option>
                        <?php } ?>
                </select>
                </div>

                {{--level of study dropdown--}}
                <div style="width: 270px; display: inline-block">
                <label for="level_of_study" style="display: initial">Level of Study</label>
                <select id="dropdownlevel_of_study" name="level_of_study" style="width: 250px">
                    <option value="any">Any</option>
                    {{--get xml data required for options in dropdown lists--}}
                    <?php $xmllevos = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/userLevelOfStudy.xml") or die("Failed to load");
                    foreach($xmllevos as $levos){
                    $levosattr = $levos->attributes();
                    ?>
                    <option value="<?php echo $levosattr['level_of_study_id'];?>"><?php echo $levos->level_of_study_name;?></option>
                    <?php } ?>
                </select>
                </div>

                {{--campus dropdown--}}
                <div style="width: 270px; display: inline-block">
                    <label for="campus" style="display: initial">Campus</label>
                    <select id="dropdowncampus" name="campus" style="width: 250px">
                        <option value="any">Any</option>
                        {{--get xml data required for options in dropdown lists--}}
                        <?php $xmlcam = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/userCampus.xml") or die("Failed to load");
                        foreach($xmlcam as $cam){
                        $camattr = $cam->attributes();
                        ?>
                        <option value="<?php echo $camattr['campus_id'];?>"><?php echo $cam->campus_name;?></option>
                        <?php } ?>
                    </select>
                </div>

                {{--shortlist button--}}
                <div style="width: 270px; display: inline-block">
                    <button onclick="shortlistFuntion()" class="button primary small">Shortlist</button>
                </div>

                <script>
                    function shortlistFunction() {
                        var facultyId = document.getElementById("dropdownfaculty").value;
                        var level_of_studyId = document.getElementById("dropdownlevel_of_study").value;
                        var campusId = document.getElementById("dropdowncampus").value;
                        var arrayProg;

                    }
                </script>

                <br/><br/>

                {{--table for programme list--}}
                <table class="alt">
                    <thead>
                    <tr>
                        <th align="center">Programme Name</th>
                        <th align="center">Description</th>
                        <th align="center">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $xmlprog = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/userProgramme.xml") or die("Failed to load");
                    foreach($xmlprog as $prog){
                    $progattr = $prog->attributes();
                    ?>
                    <tr>
                        <td align="center">
                            <?php echo $prog->programme_name;?>
                        </td>
                        <td align="center">
                            <?php echo $prog->programme_desc;?>
                        </td>
                        <td align="center">
                            <a href="{{action('userProgrammesController@show', $progattr['programme_id'])}}" class="button primary small">View Details</a>
                        </td>
                    </tr>
                    <?php } ?>

                    </tbody>

                </table>

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
