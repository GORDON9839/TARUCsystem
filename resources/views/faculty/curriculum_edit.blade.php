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

                        <form method="POST" action="{{action('curriculumsController@update',$id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                        <ul class="alt">
                            <table></tr>
                                <tr>
                                    <td align="center"><label for="curriculum_name">Curriculum Name</label></td>
                                    <td><input type="text" name="curriculum_name" value="{{$curriculum->curriculum_name}}" required/></td>
                                </tr>
                                <tr>
                                    <td align="center"><label for="curriculum_uni">Professional Curriculum University</label></td>
                                    <td><input type="text" name="curriculum_uni" value="{{$curriculum->curriculum_uni}}" required/></td>
                                </tr>
                                <tr>
                                    <td align="center"><label for="curriculum_desc">Professional Curriculum Description</label></td>
                                    <td><input type="text" name="curriculum_desc" value="{{$curriculum->curriculum_desc}}" required/></td>
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
