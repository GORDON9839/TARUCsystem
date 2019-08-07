@extends('layouts.department_staff)
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Accommodation Details</h2>

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
                                <tr><td align="left">Accommodation ID</td><td> {{$accommodation->accommodation_id}}</td></tr>
                                <tr><td align="left">Accommodation Name</td><td> {{$accommodation->accommodation_name}}</td></tr>
                                <tr><td align="left">Campus</td><td>{{$campusname->campus_name}}</td></tr>
                                <tr><td align="left">Address</td><td> {{$accommodation->accommodation_address}}</td></tr>
                                <tr><td align="left">Type</td><td> {{$accommodation->accommodation_type}}</td></tr>
                                <tr><td align="left">Total Room </td><td>{{$accommodation->total_room}}</td></tr>
                                <tr><td align="left">Rental Room </td><td> {{$accommodation->rent_number}}</td></tr>
                                <tr><td align="left">Fee per unit (RM)</td><td> {{$accommodation->fees}}</td></tr>
                                <tr>
                                    <td></td>
                                    <td align="right"> <form action="{{action('accommodationsController@destroy',$accommodation->accommodation_id)}}" method="post">
                                            @csrf
                                            {{method_field('delete')}}
                                            <input type="submit" value="Delete" onclick="return confirm('Are you sure to delete?')" class="button primary" style="background-color: lightslategrey"></a> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{action('accommodationsController@edit',$accommodation->accommodation_id)}}"><input type="button" value="Modify" class="button primary"/></a>&nbsp;&nbsp;&nbsp;&nbsp;
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

