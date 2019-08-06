@extends('layouts.faculty_staff')
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">

        <div class="container">
            <header class="major">

                <h2>Programme List</h2>

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
                            <th align="center">Programme Code</th>
                            <th align="center">Programme Name</th>
                            <th align="center">Programme Description</th>
                            <th align="center">Faculty</th>
                            <th align="center">Action</th>


                        </tr>
                        </thead>
                        <tbody>

                        <?php $xmlprog = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/programme.xml") ;
                        foreach($xmlprog as $prog){
                            ?>
                            <tr>
                                <td align="center">
                                    <?php $progattr=$prog->attributes(); echo $progattr['programme_code'];?>
                                </td>
                                <td align="center">
                                    <?php echo $prog->programme_name;?>
                                </td>
                                <td align="center">
                                    <?php echo $prog->programme_desc;?>
                                </td>
                                <td align="center">
                                    <?php echo $prog->faculty;?>
                                </td>
                                <td align="center">


                                        <a href="{{action('programmesController@show',$progattr['programme_id'])}}" class="button primary small">View Details</a>


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
