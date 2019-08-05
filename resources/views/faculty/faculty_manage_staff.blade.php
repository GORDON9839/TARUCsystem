@extends('layouts.faculty_admin')
@section('content')

    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Add New Accommodation</h2>

            </header>

            <!-- Content -->
            <section id="content">
                <form method="post" action="{{url('accommodations')}}">
                    @csrf
                    <p>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                    <p> {{Session::get('success')}}</p>
      <br/>
        @endif
        <label for="accommodation_name">Accommodation Name</label>
        <input type="text" name="accommodation_name" required autofocus/>
        <label for="accommodation_address">Accommodation address</label>
        <input type="text" name="accommodation_address" required/>
        <label for="fees">Fees</label>
        <input type="text" name="fees" required/>
        <label for="campus_id">Campus</label>
        <input type="text" name="campus_id" required/>
        </p>
        <input type="submit" value="Submit" class="primary"/>
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
