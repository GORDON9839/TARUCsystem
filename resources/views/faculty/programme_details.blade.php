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
                <h2>Programme Details</h2>

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
                                    <tr><td align="center">Programme Code</td><td> {{$programmes->programme_code}}</td></tr>
                                    <tr><td align="center">Programme Name</td><td>{{$programmes->programme_name}}</td></tr>
                                    <tr><td align="center">Programme Description</td><td> {{$programmes->programme_desc}}</td></tr>
                                    <tr><td align="center">Duration(Full Time)</td><td> {{$programmes->fulltime_duration}}</td></tr>
                                    <tr><td align="center">Duration(Part Time)</td><td> {{$programmes->parttime_duration}}</td></tr>
                                    <tr><td align="center">Faculty </td><td> {{$facultyname->faculty_name}}</td></tr>
                                    <tr><td align="center">Professional Certification</td><td> {{$programmes->professional_certification}}</td></tr>
                                    <tr><td align="center">Minimmum Entry Requirement (SPM)</td><td> {{$programmes->MER_SPM}}</td></tr>
                                    <tr><td align="center">Minimmum Entry Requirement (STPM)</td><td> {{$programmes->MER_STPM}}</td></tr>
                                    <tr><td align="center">Minimmum Entry Requirement (UEC)</td><td> {{$programmes->MER_UEC}}</td></tr>
                                    <tr><td align="center">Minimmum Entry Requirement Description  </td><td> {{$programmes->MER_desc}}</td></tr>
                                    <tr><td align="center">Incorporate Professional Curriculum </td><td>{{$curriculum->curriculum_name}}</td></tr>
                                    <tr><td align="center">Level Of Studies </td><td> {{$level->level_of_study_name}}</td></tr>
                                    <tr><td align="center">

                                        <a href="{{action('programmesController@edit',$programmes->programme_id)}}" class="button primary">Modify</a>
                                        </td><td align="center">
                                            <form action="{{action('programmesController@destroy',$programmes->programme_id)}}" method="post">
                                                @csrf
                                                {{method_field('delete')}}
                                            <input type="submit" value="Delete" onclick="return confirm('If you delete this programme, then the structure also will be deleted. Are you sure to delete?')" class="button"></a>
                                            </form>
                                </td></tr>
                                </table>
                            </ul>
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
