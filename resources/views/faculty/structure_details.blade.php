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

                <h2>Programme Structure</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <div class="row">
                    <div class="col-6 col-12-xsmall">

                        <table class="alt">
                            <thead>
                            <tr>
                                <th align="center">Subject Code</th>
                                <th align="center">Subject Name</th>
                                <th align="center">Actions</th>



                            </tr>
                            </thead>
                            <tbody>




                            <?php

                            $xmlstruc = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/structure.xml");
                            foreach($xmlstruc as $struc){
                            ?>
{{--                            <script>--}}
{{--                                alert({{$struc->programme_id}});--}}
{{--                            </script>--}}
                            @if(count($struc)!=0)
                                <tr>
                                    <td align="center">
                                        <?php echo $struc->subject_code;?>
                                    </td>
                                    <td align="center">
                                        <?php echo $struc->subject_name;?>
                                    </td>


                                    <td align="center">
                                        <?php $delete = array($struc->programme_id,$struc->subject_id);
                                        $str=implode(",",$delete);
                                        ?>

                                        <form action="{{action('structuresController@destroy',$str)}}" method="post">
                                            @csrf
                                            {{method_field('delete')}}
                                            <input type="submit" value="Delete" onclick="return confirm('Are you sure to delete?')" class="button"></a>
                                        </form>



                                    </td>


                                </tr>
                            @else
                                <p>No record found</p>
                            @endif
                            <?php }  ?>

                            </tbody>

                        </table>
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