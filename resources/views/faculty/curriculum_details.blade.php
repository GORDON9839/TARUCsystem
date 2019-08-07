
    @extends('layouts.faculty_staff')
    @section('content')

    <!-- Main -->
    <div id="main" class="wrapper style1">

        <div class="container">
            <header class="major">

                <h2>Professional Curriculum Details</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <div class="row">
                    <div class="col-6 col-12-xsmall">

                            <ul class="alt">
                                <table></tr>
                                    <tr><td align="center">Curriculum Name</td><td> {{$curriculum->curriculum_name}}</td></tr>
                                    <tr><td align="center">Curriculum Type</td><td>{{$curriculum->curriculum_uni}}</td></tr>
                                    <tr><td align="center">Curriculum Type</td><td>{{$curriculum->curriculum_desc}}</td></tr>

                                    <tr><td align="center">

                                        <a href="{{action('curriculumsController@edit',$curriculum->curriculum_id)}}" class="button primary">Modify</a>
                                        </td><td align="center">
                                            <form action="{{action('curriculumsController@destroy',$curriculum->curriculum_id)}}" method="post">
                                                @csrf
                                                {{method_field('delete')}}
                                            <input type="submit" value="Delete" onclick="return confirm('Are you sure to delete?')" class="button"></a>
                                            </form>
                                </td></tr>
                                </table>
                            </ul>
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
