@extends('layouts.department_staff')
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">

            <header class="major">
                {{--
               Author: Tan Yi Si
               Author Student ID: 18WMR08426
               --}}
                <h2>Modify Level of Study Details</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <div class="row1">
                    <div class="col-6 col-12-xsmall">

                        <form method="POST" action="{{action('level_of_studiesController@update',$id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <ul class="alt">
                                <table></tr>
                                    <tr>
                                        <td align="center"><label for="level_of_study_id">Level of Study ID</label></td>
                                        <td><input type="text" name="level_of_study_id" value="{{$levelstudy->level_of_study_id}}" disabled/></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><label for="level_of_study_name">Level of Study Name</label></td>
                                        <td><input type="text" name="level_of_study_name" value="{{$levelstudy->level_of_study_name}}" required/></td>
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
