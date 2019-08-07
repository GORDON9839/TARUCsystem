@extends('layouts.department_staff')
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
                <div class="row1">
                    <div class="col-6 col-12-xsmall">

                        <form method="POST" action="{{action('FacultiesController@update',$id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <ul class="alt">
                                <table></tr>
                                    <tr>
                                        <td align="center"><label for="faculty_id">Faculty ID</label></td>
                                        <td><input type="text" name="faculty_id" value="{{$faculty->faculty_id}}" disabled/></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><label for="faculty_name">Faculty Name</label></td>
                                        <td><input type="text" name="faculty_name" value="{{$faculty->faculty_name}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><label for="faculty_desc">Faculty Description</label></td>
                                        <td> <input type="text" name="faculty_desc" value="{{$faculty->faculty_desc}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><label for="faculty_short_name">Faculty Short Name</label></td>
                                        <td> <input type="text" name="faculty_short_name"  value="{{$faculty->faculty_short_name}}" required/></td>
                                    </tr>
                                    <tr>

                                    </tr>
                                    <tr>
                                        <td align="center">
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
