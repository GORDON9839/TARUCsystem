
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
                <h2>Campus List</h2>

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
                        <th align="center">Campus Name</th>
                        <th align="center">Campus Address</th>



                    </tr>
                    </thead>
                    <tbody>

                    <?php $xmlprog = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/campus.xml") ;?>
                    @foreach($xmlprog as $prog)

                    <tr>
                        <td align="center">
                            <?php $progattr=$prog->attributes()?> {{$prog->campus_name}}
                        </td>
                        <td align="center">
                            {{$prog->campus_address}}
                        </td>
                        <td align="center">
                            {{$prog->campus_desc}}
                        </td>

                        <td align="center">


                            <a href="{{action('programme_listsController@show',$progattr['campus_id'])}}" class="button primary small">View Programmes Offered</a>


                        </td>


                    </tr>
                    @endforeach

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
