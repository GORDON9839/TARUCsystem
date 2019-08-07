@extends('layouts.department_staff')
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">

            <header class="major">

                <h2>Modify Loan Details</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <div class="row1">
                    <div class="col-6 col-12-xsmall">

                        <form method="POST" action="{{action('loansController@update',$id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <ul class="alt">
                                <table></tr>
                                    <tr>
                                        <td align="center"><label for="loan_id">Loan ID</label></td>
                                        <td><input type="text" name="loan_id" value="{{$loan->loan_id}}" disabled/></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><label for="loan_name">Loan Name</label></td>
                                        <td><input type="text" name="loan_name" value="{{$loan->loan_name}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><label for="loan_desc">Loan Description</label></td>
                                        <td><input type="text" name="loan_desc" value="{{$loan->loan_desc}}" required/></td>
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
