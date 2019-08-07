@extends('layouts.department_staff)
@section('content')

    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Create New Accommodation</h2>

            </header>

            <!-- Content -->
            <section id="content">
                <form method="post" action="{{url('accommodation')}}">
                    @csrf


                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <p> {{\Session::get('success')}}</p></div><br/>
                    @endif
                    <label for="accommodation_name">Accommodation Name</label>
                    <input type="text"  name="accommodation_name" required autofocus/><br/>
                    <label for="accommodation_address">Accommodation Address</label>
                    <input type="text"  name="accommodation_address" required/><br/>
                    <label for="fees">Rental Fees (RM) per unit</label>
                    <input type="number"  name="fees" value=200 min=0 max=500 required/><br/>
                    <label for="total_room">Total Number of Room </label>
                    <input type="number"  name="total_room" value=300 min=0 required/><br/>
                    <label for="rent_number">Number of Rented Room</label>
                    <input type="number"  name="rent_number" value=0 min=0 required/><br/>
                    <label for="accommodation_type">Type</label>
                    <select name="accommodation_type">
                        <option value="On-Campus Hotel">On-Campus Hotel</option>
                        <option value="Off-Campus Accommodation">Off-Campus Accommodation</option>
                    </select>
                    <label for="campus_id">Campus</label>
                    <select name="campus_id">
                        <?php $xmlcampus = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/campus.xml") or die("Failed to load");
                        foreach($xmlcampus as $campus){
                        ?>
                        <option value="<?php $attr=$campus->attributes(); echo $attr['campus_id'] ?>"><?php echo $campus->campus_name; ?></option>
                        <?php } ?>
                    </select><br/>
                    <input  type="submit" value="Create" class="primary"/>
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

