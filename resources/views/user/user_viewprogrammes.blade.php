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
                <li>
                    <a href="{{action('userProgrammesController@index')}}">View Programmes</a>
                </li>
                <li>
                    <a href="{{action('userCompareselectController@index')}}">Compare Programmes</a>
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


                {{--shortlist and compare button--}}
                <div style="width: 77%; display: inline-block">
                    Faculty: <b>{{$_SESSION["userFaculty_short_name"]}}</b>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                    Level of Study: <b>{{$_SESSION["userLevel_of_study_name"]}}</b>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                    Campus: <b>{{$_SESSION["userCampus_name"]}}</b>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                    Results: <b><?php use App\XSLTTransformation;
                        $xslttrans = new XSLTTransformation('/xampp/htdocs/TARUCsystem/resources/views/XML/userProgramme.xml', '/xampp/htdocs/TARUCsystem/resources/views/xslt/userProgrammes.xsl'); ?></b>
                </div>
                <?php if($_SESSION["userFaculty_short_name"] != "Any" || $_SESSION["userLevel_of_study_name"] != "Any" || $_SESSION["userCampus_name"] != "Any") { ?>
                    <div style="width: 10%; display: inline-block">
                        <a href="{{action('userProgrammesController@index')}}" class="button small" style="background-color: transparent; border-color: white; border-width: 2px">Show All</a>
                    </div>
                <?php } else { ?>
                    <div style="width: 10%; display: inline-block"></div>
                <?php } ?>
                <div style="width: 10%; display: inline-block">
                    <a href="{{action('userShortlistfilterController@index')}}" class="button primary small">Shortlist</a>
                </div>
                <br/><br/>

                {{--get programme list from XML--}}
                <?php $xmlprog = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/userProgramme.xml") or die("No results found.");?>

                {{--table for programme list--}}
                <table class="alt">
                    <thead>
                    <tr>
                        <th align="center" style="width: 35%">Programme Name</th>
                        <th align="center">Description</th>
                        <th align="center" style="width: 15%">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach($xmlprog as $prog){
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
