@extends('layouts.department_staff')
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Loan Assignment</h2>

            </header>

            <!-- Content -->
            <section id="content">
                <form method="post" action="{{url('loanlist')}}">
                    @csrf


                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <p> {{\Session::get('success')}}</p></div><br/>
                    @endif
                    <label for="loan_id">Loan</label>
                    <select name="loan_id">
                        <?php $xmlloan = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/loan.xml") or die("Failed to load");
                        foreach($xmlloan as $loan){
                        ?>
                        <option value="<?php $attr=$loan->attributes(); echo $attr['loan_id'] ?>"><?php echo $loan->loan_name; ?></option>
                        <?php } ?>
                    </select><br/>
                    <label for="level_of_study_id">Loan</label>
                    <select name="level_of_study_id">
                        <?php $xmllevel = simplexml_load_file("/xampp/htdocs/TARUCsystem/resources/views/XML/levelstudy.xml") or die("Failed to load");
                        foreach($xmllevel as $level){
                        ?>
                        <option value="<?php $attr=$level->attributes(); echo $attr['level_of_study_id'] ?>"> <?php echo $level->level_of_study_name; ?></option>
                        <?php } ?>
                    </select><br/>
                    <label for="amount">Amount</label>
                    <input type="number"  name="amount" value=30000 min=0 required/><br/>
                    <input  type="submit" value="Create" class="primary"/>
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

