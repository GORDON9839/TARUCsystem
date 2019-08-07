@extends('layouts.faculty_staff')
@section('content')

    <!-- Main -->
    <div id="main" class="wrapper style1">

        <div class="container">
            <header class="major">

                <h2>Subject List</h2>

            </header>

            <!-- Content -->
            <section id="content">
                    @csrf
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div>
                            @endif
                            <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
                            </script>

                            <script>
                                function getMessage() {
                                    $.ajax({
                                        type:'POST',
                                        url:'/getmsg',
                                        data:'_token = <?php echo csrf_token() ?>',
                                        success:function(data) {
                                            $("#msg").html(data.msg);
                                        }
                                    });
                                }
                            </script>

                    <table class="alt">
                        <thead>
                        <tr>
                            <th align="center">Subject Code</th>
                            <th align="center">Subject Name</th>
                            <th align="center">credit Hour</th>



                        </tr>
                        </thead>
                        <tbody>

                        <?php $xmlsub = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/subject.xml");
                        foreach($xmlsub as $sub){
                            ?>
                            <tr>
                                <td align="center">
                                    <?php $subattr=$sub->attributes(); echo $subattr['subject_code'];?>
                                </td>
                                <td align="center">
                                    <?php echo $sub->subject_name;?>
                                </td>
                                <td align="center">
                                    <?php echo $sub->credit_hour;?>
                                </td>

                                <td align="center">


                                        <a href="{{action('subjectsController@show',$subattr['subject_id'])}}" class="button primary small">View Details</a>


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
