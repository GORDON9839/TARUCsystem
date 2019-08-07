@extends('layouts.faculty_staff')
@section('content')

    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Create New Programme</h2>

            </header>

            <!-- Content -->
            <section id="content">
                <form method="post" action="{{url('programmes')}}">
                    @csrf


                        @if(\Session::has('success'))
                            <div class="alert alert-success">
                    <p> {{\Session::get('success')}}</p></div><br/>
                        @endif

                    @if(count($errors)>0)

                            <div class="alert alert-danger">
                                <ul>
                                    @error('programme_code')
                                        <li>{{$err}}</li>
                                    @enderror
                                </ul>
                            </div>

                    @endif
                        <label for="programme_name">Programme Name</label>
                        <input type="text"  name="programme_name" required autofocus/><br/>
                        <label for="programme_code">Programme Code</label>
                        <input type="text" name="programme_code" required/><br/>
                        <label for="programme_desc">Programme Description</label>
                        <input type="text" name="programme_desc" required/><br/>
                        <label for="fduration">Duration Of Study (Full Time)</label>
                        <input type="number" name="fduration" min="1" max="10" value="0" required/><br/>
                        <label for="pduration">Duration Of Study (Part Time)</label>
                        <input type="number" name="pduration" min="1" max="10" value="0" required/><br/>

        <label for="professional_certification">Professional Certification</label>
        <input type="text" name="professional_certification" required/><br/>
        <label for="MER_SPM">Minimum Entry Requirement(SPM)</label>
        <input type="number" name="MER_SPM" min="1" max="10" value="0" required/><br/>
        <label for="MER_STPM">Minimum Entry Requirement(STPM)</label>
        <input type="number" name="MER_STPM" min="0.1" max="4.0" step="0.1" value="0" required/><br/>
        <label for="MER_UEC">Minimum Entry Requirement(UEC)</label>
        <input type="number" name="MER_UEC" min="1" max="10" value="0" required/><br/>
        <label for="MER_desc">Minimum Entry Requirement Description</label>
        <input type="text" name="MER_desc" required/><br/>

        <label for="faculty_id">Faculty</label>
                        <select name="faculty" required>
                        <option value="">Select Option</option>
                            <?php $xmlfaculty = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/faculty.xml") or die("Failed to load");
                            foreach($xmlfaculty as $faculty){
                            ?>
                        <option value="<?php $attr=$faculty->attributes(); echo $attr['FacultyID'] ?>"><?php echo $faculty->FacultyName; ?></option>
                            <?php } ?>
                        </select><br/>

                    <label for="curriculum_id">Incorporate Professional Curriculum</label>
                    <select name="curriculum_id">
                        <option value="">Select Option</option>
                        @foreach($curriculum as $cur){
                        ?>
                        <option value="{{$cur->curriculum_id}}">{{$cur->curriculum_name}}</option>
                        @endforeach
                    </select><br/>
                    <label for="level">Level Of Studies</label>
                    <select name="level" required>
                        <option value="">Select Option</option>
                        @foreach($level as $lv){
                        ?>
                        <option value="{{$lv->level_of_study_id}}">{{$lv->level_of_study_name}}</option>
                        @endforeach
                    </select><br/>


                    </p>
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
