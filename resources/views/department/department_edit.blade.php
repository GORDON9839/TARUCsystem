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

                        <form method="POST" action="{{action('DepartmentController@update',$id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <ul class="alt">
                                <table></tr>
                                    <tr>
                                        <td align="center"><label for="department_id">Department ID</label></td>
                                        <td><input type="text" name="department_id" value="{{$department->department_id}}" disabled/></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><label for="department_name">Department Name</label></td>
                                        <td><input type="text" name="department_name" value="{{$department->department_name}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><label for="department_desc">Department Description</label></td>
                                        <td> <input type="text" name="department_desc" value="{{$department->department_desc}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><label for="department_short_name">Department Short Name</label></td>
                                        <td> <input type="text" name="department_short_name"  value="{{$department->department_short_name}}" required/></td>
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
