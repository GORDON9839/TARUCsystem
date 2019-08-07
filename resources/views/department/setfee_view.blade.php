@extends('layouts.department_staff')
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">

                {{--
                Author: Tan Yi Si
                Author Student ID: 18WMR08426
                --}}
                <h2>View All Programme Fee</h2>

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
                        <th align="center">Programme Code</th>
                        <th align="center">Programme Name</th>
                        <th align="center">Local Student Fee (RM)</th>
                        <th align="center">International Student Fee (RM)</th>
                        <th align="center">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $xmlprog = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/programme.xml") or die("Failed to load");
                    foreach($xmlprog as $prog){
                    ?>
                    <tr>
                        <td align="center">
                            <?php $progattr=$prog->attributes(); echo $progattr['programme_code'];?>
                        </td>
                        <td align="center">
                            <?php echo $prog->programme_name;?>
                        </td>
                        <td align="center">
                            <?php echo $prog->fee_local;?>
                        </td>
                        <td align="center">
                            <?php echo $prog->fee_international;?>
                        </td>
                        <td align="center">
                            <a href="{{action('setfeeController@edit',$progattr['programme_id'])}}" class="button primary small">Modify</a>
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
