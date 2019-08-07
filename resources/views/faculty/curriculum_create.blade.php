@extends('layouts.faculty_staff')
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Incorporate Professional Curriculum</h2>

            </header>

            <!-- Content -->
            <section id="content">
                <form method="post" action="{{url('curriculum')}}">
                    @csrf


                        @if(\Session::has('success'))
                            <div class="alert alert-success">
                    <p> {{\Session::get('success')}}</p></div><br/>
                        @endif
                        <label for="curriculum_name">Professional Curriculum Name</label>
                        <input type="text"  name="curriculum_name" required autofocus/><br/>
                        <label for="curriculum_type">Professional Curriculum University</label>
                        <input type="text"  name="curriculum_uni" required/><br/>
                        <label for="curriculum_type">Professional Curriculum Description</label>
                        <input type="text"  name="curriculum_desc" required/><br/>
                        <label for="campus">Programme</label>


                    <div class="col-6 col-12-medium">
                        @foreach($programme as $prog)
                        <input type="checkbox" id="{{$prog->programme_id}}" name="programme[]" value="{{$prog->programme_id}}">
                        <label for="{{$prog->programme_id}}">{{$prog->programme_name}}</label><br/>
                        @endforeach
                    </div>



                    <input type="submit" value="Submit" class="primary"/>
                </form>
            </section>

        </div>
    </div>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrolly.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dropotron.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrollex.min.js')}}"></script>
    <script src="{{asset('assets/js/browser.min.js')}}"></script>
    <script src="{{asset('assets/js/breakpoints.min.js')}}"></script>
    <script src="{{asset('assets/js/util.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>


@endsection
