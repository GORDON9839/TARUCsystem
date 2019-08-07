
@extends('layouts.department_staff')
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">

        <div class="container">
            <header class="major">

                <h2>Faculty Details</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <div class="row1">
                    <div class="col-6 col-12-xsmall">

                        <ul class="alt">
                            <table>
                                </tr>
                                <tr><td align="center">Faculty ID</td><td> {{$faculty->faculty_id}}</td></tr>
                                <tr><td align="center">Faculty Name</td><td>{{$faculty->faculty_name}}</td></tr>
                                <tr><td align="center">Faculty Description</td><td> {{$faculty->faculty_desc}}</td></tr>
                                <tr><td align="center">Faculty Short Name</td><td> {{$faculty->faculty_short_name}}</td></tr>
                                <tr>
                                    <td></td>
                                    <td align="right"> <form action="{{action('FacultiesController@destroy',$faculty->faculty_id)}}" method="post">
                                            @csrf
                                            {{method_field('delete')}}
                                            <input type="submit" value="Delete" onclick="return confirm('Are you sure to delete?')" class="button primary" style="background-color: lightslategrey"></a> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{action('FacultiesController@edit',$faculty->faculty_id)}}"><input type="button" value="Modify" class="button primary"/></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href=""><input type="button" value="Cancel" onclick="window.history.go(-1); return false;"/></a>
                                        </form></td>

                                </tr>
                            </table>

                        </ul>
                        <!--                </xsl:if>-->

                    </div>
                </div>
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
