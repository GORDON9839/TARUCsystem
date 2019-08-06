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
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <div class="row">
                    <div class="col-12 col-12-xsmall" style="width: 100%">

                        <ul class="alt">
                            <table>
                                <tr><td align="center" width="20%">Programme Name</td>
                                    <td width="20%">{{$prog1->programme_name}}</td>
                                    <td width="20%">{{$prog2->programme_name}}</td>
                                    <?php if ($prog3 != null) { ?>
                                        <td width="20%">{{$prog3->programme_name}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                    <?php } ?>

                                <tr><td align="center">Programme Description</td>
                                    <td> {{$prog1->programme_desc}}</td>
                                    <td> {{$prog2->programme_desc}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->programme_desc}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr><td align="center">Duration(Full Time)</td>
                                    <td> {{$prog1->fulltime_duration}}</td>
                                    <td> {{$prog2->fulltime_duration}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->fulltime_duration}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr><td align="center">Duration(Part Time)</td>
                                    <td> {{$prog1->parttime_duration}}</td>
                                    <td> {{$prog2->parttime_duration}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->parttime_duration}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr><td align="center">Level of Study</td>
                                    <td> {{$levos1->level_of_study_name}}</td>
                                    <td> {{$levos2->level_of_study_name}}</td>
                                    <?php if ($levos3 != null) { ?>
                                    <td width="20%">{{$prog3->level_of_study_name}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr><td align="center">Faculty</td>
                                    <td> {{$fac1->faculty_name}}</td>
                                    <td> {{$fac2->faculty_name}}</td>
                                    <?php if ($fac3 != null) { ?>
                                    <td width="20%">{{$prog3->faculty_name}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr><td align="center">Professional Certification</td>
                                    <td> {{$prog1->professional_certification}}</td>
                                    <td> {{$prog2->professional_certification}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->professional_certification}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr><td align="center">Minimum Entry Requirement (SPM)</td>
                                    <td> {{$prog1->MER_SPM}}</td>
                                    <td> {{$prog2->MER_SPM}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->MER_SPM}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr><td align="center">Minimum Entry Requirement (STPM)</td>
                                    <td> {{$prog1->MER_STPM}}</td>
                                    <td> {{$prog2->MER_STPM}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->MER_STPM}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr><td align="center">Minimum Entry Requirement (UEC)</td>
                                    <td> {{$prog1->MER_UEC}}</td>
                                    <td> {{$prog2->MER_UEC}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->MER_UEC}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr><td align="center">Minimum Entry Requirement Description</td>
                                    <td> {{$prog1->MER_desc}}</td>
                                    <td> {{$prog2->MER_desc}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->MER_desc}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr><td align="center">Fees</td>
                                    <td>RM {{$prog1->fees}}</td>
                                    <td>RM {{$prog2->fees}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->fees}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr><td align="center">Campuses Offered</td>
                                    <td>{{$cam1}}</td>
                                    <td>{{$cam2}}</td>
                                    <?php if ($cam3 != null) { ?>
                                    <td width="20%">{{$cam3}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

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
