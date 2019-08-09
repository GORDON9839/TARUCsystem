@extends('layouts.faculty_staff')
@section('content')

    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                {{--
Author: Goh Chun Lin
Author Student ID: 18WMR08314
--}}
                <h2>Create New Subject</h2>

            </header>

            <!-- Content -->
            <section id="content">
                <form method="post" action="{{url('subject')}}">
                    {{ method_field('POST') }}
                    @csrf


                        @if(\Session::has('success'))
                            <div class="alert alert-success">
                    <p> {{\Session::get('success')}}</p></div><br/>
                        @endif
                        <label for="subject_name">Subject Name</label>
                        <input type="text"  name="subject_name" required autofocus/><br/>
                        <label for="subject_code">Subject Code</label>
                        <input type="text"  name="subject_code" required autofocus/><br/>
                        <label for="credit_hours">Credit Hours</label>
                        <input type="number" name="credit_hour" min="1" max="10" required/><br/>



                    </p>
                    <input type="submit" value="Submit" class="primary"/>
                </form>
            </section>

        </div>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
            <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
            <li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <ul class="copyright">
            <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </footer>

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
