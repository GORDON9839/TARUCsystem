<!DOCTYPE html>
{{--
Author: Tan Haw Man
Author Student ID: 18WMR08412
--}}
<html>
<head>

    <title>No Sidebar - Landed by HTML5 UP</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <noscript>
        <link rel="stylesheet" href="{{asset('assets/css/noscript.css')}}"/>
    </noscript>
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
                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Programme Name</b></td>
                                    <td width="20%">{{$prog1->programme_name}}</td>
                                    <td width="20%">{{$prog2->programme_name}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->programme_name}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Programme
                                            Description</b></td>
                                    <td> {{$prog1->programme_desc}}</td>
                                    <td> {{$prog2->programme_desc}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->programme_desc}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Duration (Full Time)</b>
                                    </td>
                                    <td> {{$prog1->fulltime_duration}} years</td>
                                    <td> {{$prog2->fulltime_duration}} years</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->fulltime_duration}} years</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Duration (Part Time)</b>
                                    </td>
                                    <td> {{$prog1->parttime_duration}} years</td>
                                    <td> {{$prog2->parttime_duration}} years</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->parttime_duration}} years</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Level of Study</b></td>
                                    <td> {{$levos1->level_of_study_name}}</td>
                                    <td> {{$levos2->level_of_study_name}}</td>
                                    <?php if ($levos3 != null) { ?>
                                    <td width="20%">{{$levos3->level_of_study_name}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Faculty</b></td>
                                    <td> {{$fac1->faculty_name}}</td>
                                    <td> {{$fac2->faculty_name}}</td>
                                    <?php if ($fac3 != null) { ?>
                                    <td width="20%">{{$fac3->faculty_name}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Professional
                                            Certification</b></td>
                                    <td> {{$prog1->professional_certification}}</td>
                                    <td> {{$prog2->professional_certification}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->professional_certification}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Minimum Entry
                                            Requirement (SPM)</b></td>
                                    <td> {{$prog1->MER_SPM}} credits</td>
                                    <td> {{$prog2->MER_SPM}} credits</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->MER_SPM}} credits</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Minimum Entry
                                            Requirement (STPM)</b></td>
                                    <td> {{$prog1->MER_STPM}} credits</td>
                                    <td> {{$prog2->MER_STPM}} credits</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->MER_STPM}} credits</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Minimum Entry
                                            Requirement (UEC)</b></td>
                                    <td> {{$prog1->MER_UEC}} credits</td>
                                    <td> {{$prog2->MER_UEC}} credits</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->MER_UEC}} credits</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Minimum Entry
                                            Requirement Description</b></td>
                                    <td> {{$prog1->MER_desc}}</td>
                                    <td> {{$prog2->MER_desc}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">{{$prog3->MER_desc}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Fees (Local)</b></td>
                                    <td>RM {{$prog1->fee_local}}</td>
                                    <td>RM {{$prog2->fee_local}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">RM {{$prog3->fee_local}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Fees (International)</b>
                                    </td>
                                    <td>RM {{$prog1->fee_international}}</td>
                                    <td>RM {{$prog2->fee_international}}</td>
                                    <?php if ($prog3 != null) { ?>
                                    <td width="20%">RM {{$prog3->fee_international}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Campuses Offered</b>
                                    </td>
                                    <td>{{$cam1}}</td>
                                    <td>{{$cam2}}</td>
                                    <?php if ($cam3 != null) { ?>
                                    <td width="20%">{{$cam3}}</td>
                                    <?php } else { ?>
                                    <td width="20%">-</td>
                                <?php } ?>

                                <tr>
                                    <td align="center" style="width: 20%; text-align: right"><b>Subjects (credit
                                            hours)</b></td>
                                    <td>{{$sub1}}</td>
                                    <td>{{$sub2}}</td>
                                    <?php if ($sub3 != null) { ?>
                                    <td width="20%">{{$sub3}}</td>
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
            <li>&copy; Untitled. All rights reserved.</li>
            <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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
