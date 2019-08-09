{{--
Author: Jack Soh Boon Keat
Author Student ID: 18WMU08324
--}}
@extends('layouts.department_staff')
@section('content')

    <!-- Main -->
    <div id="main" class="wrapper style1">

        <div class="container">
            <header class="major">

                <h2>Staff Details</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <div class="row">
                    <div class="col-12 col-12-xsmall">

                        <ul class="alt">
                            <table>
                                <tr>
                                    <th align="center">Name</th>
                                    <th align="center">Email</th>
                                    <th align="center">Role</th>
                                    <th align="center">Belongs to</th>

                                </tr>
                                <?php $xmlstaff = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/all_staff.xml") or die("Failed to load");
//                                echo action('userControllers@getstaffByType') . "?role=admin";
//                                $staff=action('userControllers@getstaffByType') . "?role=admin";
//                                $ch = curl_init();
//                                curl_setopt($ch, CURLOPT_URL, $staff);
//                                curl_setopt($ch, CURLOPT_POST, 1);
//                                curl_setopt($ch, CURLOPT_POSTFIELDS, "type");
//                                $real_staff = curl_exec($ch);
//                                print_r($real_staff);
//                                curl_close($ch);
                                ?>

{{--                                <p>{{$real_staff}} </p>--}}
                                <?php

                                foreach($xmlstaff as $staff){
                                $belongs_to = "";

                                if (empty($staff->faculty_id)) {
                                    $belongs_to = "department";
                                } else {
                                    $belongs_to = "faculty";
                                }
                                ?>

                                <tr>

                                    <td align="center">{{$staff->name}}</td>
                                    <td align="center">{{$staff->email}}</td>
                                    <td align="center">
                                        <form action="{{action('userControllers@update',$staff->id)}}" method="post">
                                            @csrf


                                            <select class="form-control" name="role" id="role"
                                                    onchange="this.form.submit()">
                                                @if($staff->role == "admin")
                                                    <option value="admin" selected="selected">ADMIN</option>
                                                    <option value="staff">STAFF</option>
                                                @else
                                                    <option value="admin">ADMIN</option>
                                                    <option value="staff" selected="selected">STAFF</option>
                                                @endif
                                                {{$staff->role}}</select>
                                        </form>
                                    </td>
                                    </form>
                                    <td align="center">{{$belongs_to}}</td>

                                </tr>


                                <?php } ?>


                            </table>
                            <?php
                            use App\XSLTTransformation;use Illuminate\Http\Request;use Illuminate\Routing\Route as RouteAlias1;use Illuminate\Support\Facades\Route as RouteAlias;

                            $count = new XSLTTransformation("/xampp/htdocs/TARUCsystem/resources/views/XML/all_staff.xml", "/xampp/htdocs/TARUCsystem/resources/views/xslt/countstaff.xsl");

                            $count_staff = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/xslt/countstaff.xsl") or die("Failed to load");
                            ?>
                            <div class="col-6 col-12-xsmall">
                                <p>{{$count_staff}}</p>

                            </div>

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

