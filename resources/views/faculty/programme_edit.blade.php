@extends('layouts.faculty_staff')
@section('content')

    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">

            <header class="major">

                <h2>Modify Programme Details</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif

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
                <div class="row">
                    <div class="col-6 col-12-xsmall">

                        <form method="POST" action="{{action('programmesController@update',$programmes->programme_id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                        <ul class="alt">
                            <table></tr>
                                <tr>
                                    <td align="center"><label for="programme_code">Programme Code</label></td>
                                    <td><input type="text" name="programme_code" value="{{$programmes->programme_code}}" required/></td>
                                </tr>
                                <tr>
                                    <td align="center"><label for="programme_name">Programme Name</label></td>
                                    <td><input type="text" name="programme_name" value="{{$programmes->programme_name}}" required/></td>
                                </tr>
                                <tr>
                                    <td align="center"><label for="programme_desc">Programme Description</label></td>
                                    <td> <input type="text" name="programme_desc" value="{{$programmes->programme_desc}}" required/></td>
                                </tr>
                                <tr>
                                    <td align="center"><label for="fduration">Duration(Full Time)</label></td>
                                    <td> <input type="number" name="fduration"  value="{{$programmes->fulltime_duration}}" required/></td>
                                </tr>
                                <tr>
                                    <td align="center"><label for="pduration">Duration(Part Time)</label></td>
                                    <td> <input type="number" name="pduration" value="{{$programmes->parttime_duration}}" required/></td>
                                </tr>
                                <tr>
                                    <td align="center"><label for="faculty">Faculty </label></td>
                                    <td>
                                        <select name="faculty">

                                        <?php $xmlfaculty = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/faculty.xml") or die("Failed to load");
                                        foreach($xmlfaculty as $faculty){
                                        $attr=$faculty->attributes();
                                        ?>
                                        @if($attr['FacultyID'] ==$facultyname->faculty_id)
                                            <option value="<?php echo $attr['FacultyID'] ?>" selected="selected"><?php echo $faculty->FacultyName; ?></option>
                                        @else
                                            <option value="<?php echo $attr['FacultyID'] ?>"><?php echo $faculty->FacultyName; ?></option>
                                        @endif
                                        <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center"><label for="professional_certification">Professional Certification</label></td>
                                    <td> <input type="text" name="professional_certification" value="{{$programmes->professional_certification}}" required/></td>
                                </tr>
                                <tr>
                                    <td align="center"><label for="MER_SPM">Minimum Entry Requirement (SPM)</label></td>
                                    <td> <input type="number" name="MER_SPM"  value="{{$programmes->MER_SPM}}" required/></td>
                                </tr>
                                <tr>
                                    <td align="center"><label for="MER_STPM">Minimum Entry Requirement (STPM)</label></td>
                                    <td> <input type="number" name="MER_STPM"  value="{{$programmes->MER_STPM}}" required/></td></tr>
                                <tr>
                                    <td align="center"><label for="MER_UEC">Minimum Entry Requirement (UEC)</label></td>
                                    <td> <input type="number" name="MER_UEC"  value="{{$programmes->MER_UEC}}" required/></td>
                                </tr>
                                <tr>
                                    <td align="center"><label for="MER_desc">Minimum Entry Requirement Description</label>  </td>
                                    <td><input type="text" name="MER_desc" value="{{$programmes->MER_desc}}" required/> </td>
                                </tr>
                                <tr>
                                    <td><label for="curriculum">Incorporate Professional Curriculum</label></td>
                                    <td><select name="curriculum">
                                        <option value="">Select Option</option>
                                        @foreach($curriculum as $cur)
                                                @if($programmes->curriculum_id ==$cur->curriculum_id)
                                                    <option value="{{$cur->curriculum_id}}" selected="selected">{{$cur->curriculum_name}}</option>
                                                @else
                                                    <option value="{{$cur->curriculum_id}}">{{$cur->curriculum_name}}</option>
                                                @endif
                                       @endforeach
                                    </select><br/></td>
                                </tr>
                                <tr>
                                    <td><label for="level">Level Of Study</label></td>
                                    <td><select name="level">
                                            <option value="">Select Option</option>
                                            @foreach($level as $lv){
                                            ?>
                                            @if($lv->level_of_study_id == $programmes->level_of_study_id)
                                                <option value="{{$lv->level_of_study_id}} "selected>{{$lv->level_of_study_name}}</option>
                                            @else
                                                <option value="{{$lv->level_of_study_id}}">{{$lv->level_of_study_name}}</option>
                                            @endif
                                            @endforeach
                                        </select><br/></td>
                                </tr>
                                <tr><td align="center">

                                        <input type="submit" value="Submit" onclick="return confirm('Are you sure to modify?')" class="button primary"/>
                                        <script>
                                            $(".Edit").on("submit", function(){
                                                return confirm("Are you sure?");
                                            });
                                        </script>
                                    </td></tr>
                            </table>
                        </ul></form>
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
