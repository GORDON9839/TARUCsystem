@extends('layouts.department_staff)
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">

        <div class="container">
            <header class="major">

                <h2>Campuses List</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @csrf
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <table class="alt">
                    <thead>
                    <tr>
                        <th align="center"><b>ID</b></th>
                        <th align="center">Campus Name</th>
                        <th align="center">Description</th>
                        <th align="center">Address</th>
                        <th align="center">Action</th>


                    </tr>
                    </thead>
                    <tbody>

                    <?php $xmlcam = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/campus.xml") or die("Failed to load");
                    foreach($xmlcam as $cam){
                    ?>
                    <tr>
                        <td align="center">
                            <?php $camattr=$cam->attributes(); echo $camattr['campus_id'];?>
                        </td>
                        <td align="left">
                            <?php echo $cam->campus_name;?>
                        </td>
                        <td align="left">
                            <?php echo $cam->campus_desc;?>
                        </td>
                        <td align="left">
                            <?php echo $cam->campus_address;?>
                        </td>
                        <td align="center">
                            <a href="{{action('campusesController@show',$camattr['campus_id'])}}" class="button primary small">View Details</a>
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


<!-- Scripts -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrolly.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dropotron.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrollex.min.js')}}"></script>
<script src="{{asset('assets/js/browser.min.js')}}"></script>
<script src="{{asset('assets/js/breakpoints.min.js')}}"></script>
<script src="{{asset('assets/js/util.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

@endsection
