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
            <h2 style="text-align: center">Programme Details</h2>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <div class="row">
                    <div class="col-12 col-12-xsmall">

                        <ul class="alt">
                            <table>
                                <tr>
                                    <td align="center" style="text-align: right; width: 30%"><b>Programme Name</b></td>
                                    <td style="padding-left: 5%">{{$programmes->programme_name}}</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Programme Description</b></td>
                                    <td style="padding-left: 5%"> {{$programmes->programme_desc}}</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Duration (Full Time)</b></td>
                                    <td style="padding-left: 5%"> {{$programmes->fulltime_duration}} years</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Duration (Part Time)</b></td>
                                    <td style="padding-left: 5%"> {{$programmes->parttime_duration}} years</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Level of Study</b></td>
                                    <td style="padding-left: 5%"> {{$level_of_study->level_of_study_name}}</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Faculty</b></td>
                                    <td style="padding-left: 5%"> {{$faculty->faculty_name}}</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Professional Certification</b></td>
                                    <td style="padding-left: 5%"> {{$programmes->professional_certification}}</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Minimum Entry Requirement (SPM)</b>
                                    </td>
                                    <td style="padding-left: 5%"> {{$programmes->MER_SPM}} credits</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Minimum Entry Requirement (STPM)</b>
                                    </td>
                                    <td style="padding-left: 5%"> {{$programmes->MER_STPM}} credits</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Minimum Entry Requirement (UEC)</b>
                                    </td>
                                    <td style="padding-left: 5%"> {{$programmes->MER_UEC}} credits</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Minimum Entry Requirement
                                            Description</b></td>
                                    <td style="padding-left: 5%"> {{$programmes->MER_desc}}</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Fees (Local)</b></td>
                                    <td style="padding-left: 5%">RM {{$programmes->fee_local}}</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Fees (International)</b></td>
                                    <td style="padding-left: 5%">RM {{$programmes->fee_international}}</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Campuses Offered</b></td>
                                    <td style="padding-left: 5%">{{$campusnameliststring}}</td>

                                <tr>
                                    <td align="center" style="text-align: right"><b>Subjects (credit hours)</b></td>
                                    <td style="padding-left: 5%">{{$subjectnameliststring}}</td>

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
