@extends('layouts.department_staff')
@section('content')
    {{--
Author: Tan Yi Si
Author Student ID: 18WMR08426
--}}
    <!-- Main -->
    <div id="main" class="wrapper style1">

        <div class="container">
            <header class="major">

                <h2>Faculty List</h2>

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
                        <th align="center"><b>Faculty ID</b></th>
                        <th align="center">Faculty Name</th>
                        <th align="center">Faculty Description</th>
                        <th align="center">Faculty Short Name</th>
                        <th align="center">Action</th>


                    </tr>
                    </thead>
                    <tbody>

                    <?php $xmlfac = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/faculty.xml") or die("Failed to load");
                    foreach($xmlfac as $fac){
                    ?>
                    <tr>
                        <td align="center">
                            <?php $facattr=$fac->attributes(); echo $facattr['faculty_id'];?>
                        </td>
                        <td align="center">
                            <?php echo $fac->faculty_name;?>
                        </td>
                        <td align="center">
                            <?php echo $fac->faculty_desc;?>
                        </td>
                        <td align="center">
                            <?php echo $fac->faculty_short_name;?>
                        </td>
                        <td align="center">
                            <a href="{{action('FacultiesController@show',$facattr['faculty_id'])}}" class="button primary small">View Details</a>
                        </td>


                    </tr>
                    <?php } ?>

                    </tbody>

                </table>

                <br/>
            </section>
        </div>
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

@endsection
