@extends('layouts.department_staff')
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Facilities List</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <div class="row1">
                    <div class="col-6 col-12-xsmall">

                        <form method="POST" action="{{action('facilities_listsController@update',$id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <ul class="alt">
                                <table></tr>
                                    <tr>
                                        <td align="left"><label for="facility_id">Facility ID</label></td>
                                        <td><input type="text" name="facility_id" value="{{$facility->facility_id}}" disabled/></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="facility_name">Facility Name</label></td>
                                        <td><input type="text" name="facility_name" value="{{$facility->facility_name}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="facility_desc">Facility Description</label></td>
                                        <td> <input type="text" name="facility_desc" value="{{$facility->facility_desc}}" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><label for="campus_id">Assigned To Campus :</label></td>
                                    </tr>
                                    <td>
                                        <?php $xmlcam = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/campus.xml");
                                        $camid=[];
                                        foreach($facilityList as $fcl){
                                        foreach($xmlcam as $cam){
                                            $camattr = $cam->attributes();
                                            if($fcl->campus_id == $camattr['campus_id']){
                                            //$camid[]=$camattr['campus_id'];
                                           // var_dump($camid);
                                        ?>
                                            <input type="checkbox" id="{{$camattr['campus_id']}}" name="{{$camattr['campus_name']}}" value="{{$camattr['campus_id']}}" checked>
                                            <label for="{{$camattr['campus_id']}}">{{$cam->campus_name}}</label> &nbsp;&nbsp;&nbsp;


                                        <?php }else{?>
                                                <input type="checkbox" id="{{$camattr['campus_id']}}" name="{{$camattr['campus_id']}}" value="{{$camattr['campus_id']}}"/>
                                            <label for="{{$camattr['campus_id']}}">{{$cam->campus_name}}</label> &nbsp;&nbsp;&nbsp;
                                            <?php
                                        }}}?>

                                    </td>
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

