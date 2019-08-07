@extends('layouts.faculty_staff')
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">

            <header class="major">

                <h2>Modify Programme Details</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif



                <div class="row">
                    <div class="col-6 col-12-xsmall">

                        <form method="POST" action="{{action('subjectsController@update',$id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                        <ul class="alt">
                            <table></tr>
                                <tr>
                                    <td align="center"><label for="subject_code">Subject Code</label></td>
                                    <td><input type="text" name="subject_code" value="{{$subject->subject_code}}" required/></td>
                                </tr>
                                <tr>
                                    <td align="center"><label for="subject_name">Subject Name</label></td>
                                    <td><input type="text" name="subject_name" value="{{$subject->subject_name}}" required/></td>
                                </tr>
                                <tr>
                                    <td align="center"><label for="credit_hour">Credit Hour</label></td>
                                    <td> <input type="number" name="credit_hour" value="{{$subject->credit_hour}}" required/></td>
                                </tr>


                                <tr><td align="center">

                                        <input type="submit" value="Submit" onclick="return confirm('Are you sure to modify?')" class="button primary"/>

                                    </td></tr>
                            </table>
                        </ul></form>
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
