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
            <h2 style="text-align: center">Compare Programmes</h2>

            <!-- Content -->
            <section id="content">
                @csrf
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif

                <form action="{{action('userCompareresultController@index')}}" method="post">
                    @csrf
                    {{--shortlist filter part--}}

                    {{--first dropdown--}}
                    <div style="width: 25%; display: inline-block">
                        <label for="comparefirst" style="display: initial">Select a programme: (required)</label>
                        <select id="dropdownfirst" name="comparefirst" style="width: 300px;">
                            {{--get xml data required for options in dropdown lists--}}
                            <?php $xmlprog = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/userProgramme.xml") or die("No results found.");
                            foreach($xmlprog as $prog){
                            $progattr = $prog->attributes();
                            ?>
                            <option value="<?php echo $progattr['programme_id'];?>"><?php echo $prog->programme_name;?></option>
                            <?php } ?>
                        </select>
                    </div>

                    {{--second dropdown--}}
                    <div style="width: 25%; display: inline-block">
                        <label for="comparesecond" style="display: initial">Select a programme: (required)</label>
                        <select id="dropdownsecond" name="comparesecond" style="width: 300px">
                            {{--get xml data required for options in dropdown lists--}}
                            <?php $xmlprog = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/userProgramme.xml") or die("No results found.");
                            foreach($xmlprog as $prog){
                            $progattr = $prog->attributes();
                            ?>
                            <option value="<?php echo $progattr['programme_id'];?>"><?php echo $prog->programme_name;?></option>
                            <?php } ?>
                        </select>
                    </div>

                    {{--third dropdown--}}
                    <div style="width: 25%; display: inline-block">
                        <label for="comparethird" style="display: initial">Select a programme: (optional)</label>
                        <select id="dropdowncampus" name="comparethird" style="width: 300px">
                            <option value="None">None</option>
                            {{--get xml data required for options in dropdown lists--}}
                            <?php $xmlprog = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/userProgramme.xml") or die("No results found.");
                            foreach($xmlprog as $prog){
                            $progattr = $prog->attributes();
                            ?>
                            <option value="<?php echo $progattr['programme_id'];?>"><?php echo $prog->programme_name;?></option>
                            <?php } ?>
                        </select>
                    </div>

                    {{--shortlist button--}}
                    <div style="width: 20%; display: inline-block">
                        <input type="submit" value="Compare">
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
