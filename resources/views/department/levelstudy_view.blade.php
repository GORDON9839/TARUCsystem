@extends('layouts.department_staff')
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">

        <div class="container">
            <header class="major">

                <h2>Level of Study List</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @csrf
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <table class="alt">
                    <thead>
                    <tr>
                        <th align="center"><b>ID</b></th>
                        <th align="center">Level of Study Name</th>
                        <th align="center">Action</th>


                    </tr>
                    </thead>
                    <tbody>

                    <?php $xmlls = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/levelstudy.xml") or die("Failed to load");
                    foreach($xmlls as $ls){
                    ?>
                    <tr>
                        <td align="center">
                            <?php $attr=$ls->attributes(); echo $attr['level_of_study_id'];?>
                        </td>
                        <td align="left">
                            <?php echo $ls->level_of_study_name;?>
                        </td>
                        <td align="center">
                            <a href="{{action('level_of_studiesController@show',$attr['level_of_study_id'])}}" class="button primary small">View Details</a>
                        </td>


                    </tr>
                    <?php } ?>

                    </tbody>

                </table>

                <br/>
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
