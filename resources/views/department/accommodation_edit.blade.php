@extends('layouts.department_staff')
@section('content')
    {{--
Author: Tan Yi Si
Author Student ID: 18WMR08426
--}}
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Update Accommodation Details</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <div class="row1">
                    <div class="col-6 col-12-xsmall">

                        <form method="POST" action="{{action('accommodationsController@update',$id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <ul class="alt">
                                <table></tr>
                                    <tr>
                                        <td align="left"><label for="accommodation_id">Accommodation ID</label></td>
                                        <td><input type="text" name="accommodation_id" value="{{$accommodation->accommodation_id}}" disabled/></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="accommodation_name">Accommodation Name</label></td>
                                        <td><input type="text" name="accommodation_name" value="{{$accommodation->accommodation_name}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="accommodation_address">Accommodation Address</label></td>
                                        <td> <input type="text" name="accommodation_address" value="{{$accommodation->accommodation_address}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="campus_id">Campus</label></td>
                                        <td>
                                            <select name="campus_id">

                                                <?php $xmlcampus = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/campus.xml") or die("Failed to load");
                                                foreach($xmlcampus as $campus){
                                                $attr=$campus->attributes();
                                                ?>
                                                @if($attr['campus_id'] ==$campusname->campus_id)
                                                    <option value="<?php echo $attr['campus_id'] ?>" selected="selected"><?php echo $campus->campus_name; ?></option>
                                                @else
                                                    <option value="<?php echo $attr['campus_id'] ?>"><?php echo $campus->campus_name; ?></option>
                                                @endif
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="accommodation_type">Type</label></td>
                                        <td><select name="accommodation_type">
                                            <option value="{{$accommodation->accommodation_type}}">{{$accommodation->accommodation_type}}</option>
                                            <option value="On-Campus Hotel">On-Campus Hotel</option>
                                            <option value="Off-Campus Accommodation">Off-Campus Accommodation</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="total_room">Total Room</label></td>
                                        <td> <input type="number" name="total_room" min=0 value="{{$accommodation->total_room}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="rent_number">Rented Room</label></td>
                                        <td> <input type="number" name="rent_number" min=0 value="{{$accommodation->rent_number}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="fees">Fees Per Room (RM)</label></td>
                                        <td> <input type="number" name="fees" min=0 value="{{$accommodation->fees}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="left">
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

