<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Create New Accommodation</title>
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
                    <a href="{{action('accommodationsController@index')}}">Accommodation</a>
                    <ul>
                        <li><a href="{{action('accommodationsController@create')}}">Create Accommodation</a></li>
                        <li><a href="{{action('accommodationsController@index')}}">View All Accommodation</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{action('FacultiesController@index')}}">Faculty</a>
                    <ul>
                        <li><a href="{{action('FacultiesController@create')}}">Create Faculty</a></li>
                        <li><a href="{{action('FacultiesController@index')}}">View All Faculty</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Department</a>
                    <ul>
                        <li><a href="{{action('DepartmentController@index')}}">Create Department</a></li>
                        <li><a href="{{action('DepartmentController@index')}}">View All Department</a></li>
                        <li><a href=""></a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{action('campusesController@index')}}">Campus</a>
                    <ul>
                        <li><a href="{{action('campusesController@create')}}">Create Campus</a></li>
                        <li><a href="{{action('campusesController@index')}}">View All Campus</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{action('facilities_listsController@index')}}">Facility</a>
                    <ul>
                        <li><a href="{{action('facilities_listsController@create')}}">Create Facility</a></li>
                        <li><a href="{{action('facilities_listsController@index')}}">View All Facility</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{action('loansController@index')}}">Loan</a>
                    <ul>
                        <li><a href="{{action('loansController@create')}}">Create Loan</a></li>
                        <li><a href="{{action('loansController@index')}}">View All Loan</a></li>
                        <li><a href="{{action('loanlistController@create')}}">Assign Loan To Study Level</a></li>
                        <li><a href="{{action('loanlistController@index')}}">View Loan List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="action={{action('level_of_studiesController@index')}}">Study Level</a>
                    <ul>
                        <li><a href="{{action('level_of_studiesController@create')}}">Create Study Level</a></li>
                        <li><a href="{{action('level_of_studiesController@index')}}">View All Study Level</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{action('setfeeController@index')}}">Fee</a>
                    <ul>
                        <li><a href="{{action('setfeeController@index')}}">Set Programme Fee</a></li>
                        <li><a href="{{action('setfeeController@index')}}">View Programme Fee</a></li>
                    </ul>
                </li>
                <li><a href="#" class="button primary">Staff Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Loan Assignment</h2>

            </header>

            <!-- Content -->
            <section id="content">
                <form method="post" action="{{url('loanlist')}}">
                    @csrf


                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <p> {{\Session::get('success')}}</p></div><br/>
                    @endif
                    <label for="loan_id">Loan</label>
                    <select name="loan_id">
                        <?php $xmlloan = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/loan.xml") or die("Failed to load");
                        foreach($xmlloan as $loan){
                        ?>
                        <option value="<?php $attr=$loan->attributes(); echo $attr['loan_id'] ?>"><?php echo $loan->loan_name; ?></option>
                        <?php } ?>
                    </select><br/>
                    <label for="level_of_study_id">Loan</label>
                    <select name="level_of_study_id">
                        <?php $xmllevel = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/levelstudy.xml") or die("Failed to load");
                        foreach($xmllevel as $level){
                        ?>
                        <option value="<?php $attr=$level->attributes(); echo $attr['level_of_study_id'] ?>"> <?php echo $level->level_of_study_name; ?></option>
                        <?php } ?>
                    </select><br/>
                    <label for="amount">Amount</label>
                    <input type="number"  name="amount" value=30000 min=0 required/><br/>
                    <input  type="submit" value="Create" class="primary"/>
                    @if(count($errors))
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
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

