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

                <h2>Departments List</h2>

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
                        <th align="center">Department Name</th>
                        <th align="center">Short Name</th>
                        <th align="center">Description</th>
                        <th align="center">Action</th>


                    </tr>
                    </thead>
                    <tbody>

                    <?php $xmldep = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/department.xml") or die("Failed to load");
                    foreach($xmldep as $dep){
                    ?>
                    <tr>
                        <td align="center">
                            <?php $depattr=$dep->attributes(); echo $depattr['department_id'];?>
                        </td>
                        <td align="left">
                            <?php echo $dep->department_name;?>
                        </td>
                        <td align="left">
                            <?php echo $dep->department_short_name;?>
                        </td>
                        <td align="left">
                            <?php echo $dep->department_desc;?>
                        </td>
                        <td align="center">
                            <a href="{{action('DepartmentController@show',$depattr['department_id'])}}" class="button primary small">View Details</a>
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
