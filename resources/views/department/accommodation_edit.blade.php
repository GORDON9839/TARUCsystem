<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Edit Accommodation Details</title>
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
                        <li><a href="{{action('DepartmentController@create')}}">Create Department</a></li>
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
                <h2>Create New Accommodation</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <div class="row1">
                    <div class="col-6 col-12-xsmall">

                        <form method="POST" action="{{action('accommodationsController@update',$id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <ul class="alt">
                                <table></tr>
                                    <tr>
                                        <td align="left"><label for="accommodation_id">Accommodation ID</label></td>
                                        <td><input type="text" name="accommodation_id" value="{{$accommodation->accommodation_id}}" disabled/></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="accommodation_name">Accommodation Name</label></td>
                                        <td><input type="text" name="accommodation_name" value="{{$accommodation->accommodation_name}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="accommodation_address">Accommodation Address</label></td>
                                        <td> <input type="text" name="accommodation_address" value="{{$accommodation->accommodation_address}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="campus_id">Campus</label></td>
                                        <td>
                                            <select name="campus_id">

                                                <?php $xmlcampus = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/campus.xml") or die("Failed to load");
                                                foreach($xmlcampus as $campus){
                                                $attr=$campus->attributes();
                                                ?>
                                                @if($attr['campus_id'] ==$campusname->campus_id)
                                                    <option value="<?php echo $attr['campus_id'] ?>" selected="selected"><?php echo $campus->campus_name; ?></option>
                                                @else
                                                    <option value="<?php echo $attr['campus_id'] ?>"><?php echo $campus->campus_name; ?></option>
                                                @endif
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="accommodation_type">Type</label></td>
                                        <td><select name="accommodation_type">
                                            <option value="{{$accommodation->accommodation_type}}">{{$accommodation->accommodation_type}}</option>
                                            <option value="On-Campus Hotel">On-Campus Hotel</option>
                                            <option value="Off-Campus Accommodation">Off-Campus Accommodation</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="total_room">Total Room</label></td>
                                        <td> <input type="number" name="total_room" min=0 value="{{$accommodation->total_room}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="rent_number">Rented Room</label></td>
                                        <td> <input type="number" name="rent_number" min=0 value="{{$accommodation->rent_number}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="fees">Fees Per Room (RM)</label></td>
                                        <td> <input type="number" name="fees" min=0 value="{{$accommodation->fees}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                        </td>
                                        <td align="right">

                                            <input type="submit" value="Update" onclick="return confirm('Are you sure to modify?')" class="button primary"/>
                                            <script>
                                                $(".Edit").on("submit", function(){
                                                    return confirm("Are you sure?");
                                                });
                                            </script>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><input type="button" value="Cancel"/></a>
                                        </td>
                                    </tr>
                                </table>

                            </ul>
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

