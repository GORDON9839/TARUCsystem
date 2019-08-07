@extends('layouts.department_staff)
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Create New Faculty</h2>

            </header>

            <!-- Content -->
            <section id="content">
                <form method="post" action="{{url('faculty')}}">
                    @csrf


                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <p> {{\Session::get('success')}}</p></div><br/>
                    @endif
                    <label for="faculty_name">Faculty Name</label>
                    <input type="text"  name="faculty_name" required autofocus/><br/>
                    <label for="faculty_short_name">Faculty Short Name</label>
                    <input type="text" name="faculty_short_name" required/><br/>
                    <label for="faculty_desc">Faculty Description</label>
                    <input type="text" name="faculty_desc" required/><br/>
                    <input  type="submit" value="Create" class="primary"/>
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
