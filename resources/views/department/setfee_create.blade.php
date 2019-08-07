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
                <h2>Set Programme Fees</h2>

            </header>

            <section id="content">
                <form action="{{action('setfeeController@update', $id)}}" method="post">

                    @method('PUT')
                    @csrf
                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <p> {{\Session::get('success')}}</p></div><br/>
                    @endif
                    <?php  ?>
                    <label for="programme_name">Programme Name</label>
                    <input type="text"  name="programme_name" value="{{$prog->programme_name}}" required disabled/><br/>
                    <label for="programme_code">Programme Code</label>
                    <input type="text" name="programme_code" value="{{$prog->programme_code}}" disabled required/><br/>
                    <label for="fee_local">Local Student Fees (RM)</label>
                    <input type="number" name="fee_local"  value="{{$prog->fee_local}}" required/><br/>
                    <label for="fee_international">International Student Fees (RM)</label>
                    <input type="number" name="fee_international"  value="{{$prog->fee_international}}" required/><br/>
                    </p>

                <input type="submit" class="button primary small" value="Modify"/>
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
