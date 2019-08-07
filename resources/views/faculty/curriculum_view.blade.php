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
                <h2>Professional Curriculum List</h2>

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

                            <th align="center">Professional Curriculum Name</th>
                            <th align="center">Professional Curriculum University</th>
                            <th align="center">Professional Curriculum Description</th>



                        </tr>
                        </thead>
                        <tbody>

                        <?php $xmlcur = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/curriculum.xml");
                        foreach($xmlcur as $cur){
                            $curattr=$cur->attributes();
                            ?>
                            <tr>

                                <td align="center">
                                    <?php echo $cur->curriculum_name;?>
                                </td>
                                <td align="center">
                                    <?php echo $cur->curriculum_uni;?>
                                </td>
                                <td align="center">
                                    <?php echo $cur->curriculum_desc;?>
                                </td>

                                <td align="center">


                                        <a href="{{action('curriculumsController@show',$curattr['curriculum_id'])}}" class="button primary small">View Details</a>


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
