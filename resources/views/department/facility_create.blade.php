@extends('layouts.department_staff')
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Create New Facility</h2>

            </header>

            <!-- Content -->
            <section id="content">
                <form method="post" action="{{url('facility')}}">
                    @csrf


                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <p> {{\Session::get('success')}}</p></div><br/>
                    @endif
                    <label for="facility_name">Facility Name</label>
                    <input type="text"  name="facility_name" required autofocus/><br/>
                    <label for="facility_desc">Facility Description</label>
                    <input type="text"  name="facility_desc" required/><br/>
                    <label for="campus_id">Assigned To Campus</label>
                    <?php $xmlcam = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/campus.xml");
                    foreach($xmlcam as $cam){
                        $camattr = $cam->attributes();
                    ?>
                    <input type="checkbox" id="{{$camattr['campus_id']}}" name="campus[]" value="{{$camattr['campus_id']}} checked">
                    <label for="{{$camattr['campus_id']}}">{{$cam->campus_name}}</label> &nbsp;&nbsp;&nbsp;
                    <?php } ?>
                    <br/><br/><input  type="submit" value="Create" class="primary"/>
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

