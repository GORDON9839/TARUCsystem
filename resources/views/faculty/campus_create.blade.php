@extends('layouts.faculty_staff')
@section('content')

    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Add New Programme Offered</h2>

            </header>

            <!-- Content -->
            <section id="content">
                <form method="post" action="{{url('campusoffered')}}">
                    @csrf


                        @if(\Session::has('success'))
                            <div class="alert alert-success">
                    <p> {{\Session::get('success')}}</p></div><br/>
                        @endif
                    <select name="programme" required>
                        <option value="">Select Option</option>
                    <?php $xmlprog = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/programme.xml");
                    foreach($xmlprog as $cur){
                    $progattr=$cur->attributes();
                    ?>
                        <option value="<?php echo $progattr['programme_id'];?>"><?php echo $cur->programme_name;?></option>
                        <?php } ?>
                    </select><br/>


                    <div class="col-6 col-12-medium">
                        <?php $xmlcamp= simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/campus.xml")
                        ?>
                        @foreach($xmlcamp as $camp)
                            <?php $campattr=$camp->attributes()?>
                            <input type="checkbox" id="{{$campattr['campus_id']}}" name="campus[]" value="{{$campattr['campus_id']}}">
                            <label for="{{$campattr['campus_id']}}">{{$camp->campus_name}}</label><br/>
                        @endforeach
                    </div>




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
