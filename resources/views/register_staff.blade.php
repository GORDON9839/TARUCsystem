@extends("layouts.faculty_admin")
@section("content")
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Add New Staff</h2>

            </header>

            <!-- Content -->
            <section id="content">
                <form method="post" action="{{ route('register') }}">
                    @csrf
                    <p>

                        @if(\Session::has('success'))
                            <div class="alert alert-success">
                    <p> {{\Session::get('success')}}</p>


      <br/>
        @endif
                        <label for="name" class="">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                            <select class="form-control" name="role" id="role">
                                <option value="admin">ADMIN</option>
                                <option value ="staff">STAFF</option>
                            </select>
                    <!-- script !-->
                    <script>
                        function changeText(){
                            var e = document.getElementById('create_for');
                            var select = e.value;
                            //get the data from dropdown

                            //show different txt
                            if(select ==='faculty'){
                                document.getElementById('reference_id_text').innerText="Which Faculty:";
                                document.getElementById('reference_id_text').style.visibility="visible";
                                document.getElementById('reference_id').style.visibility="visible";


                            }else if(select === "department"){
                                document.getElementById('reference_id_text').innerText="Which Department:";
                                document.getElementById('reference_id_text').style.visibility="visible";
                                document.getElementById('reference_id').style.visibility="visible";
                            }
                        }
                    </script>
                    <label for="create_for" class="col-md-4 col-form-label text-md-right">{{ __('Create For') }}</label>
                    <select onchange="changeText()" class="form-control" name="create_for" id="create_for">
                        <option value="">Please Choose One</option>
                        <option value="faculty">FACULTY</option>
                        <option value ="department">DEPARTMENT</option>
                    </select>


                        <label for="ddl_create_for" id="reference_id_text" style="visibility: visible" class="col-md-4 col-form-label text-md-right">Choose one</label>


                            <select  class="form-control" name="ddl_create_for" id="ddl_create_for">
                                @foreach($faculty as $f)
                                    <option value ="{{$f->faculty_id}}">{{$f->faculty_short_name}}</option>
                                @endforeach
                                @foreach($department as $d)
                                    <option value ="{{$d->department_id}}">{{$d->department_short_name}}</option>
                                @endforeach
                            </select>

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
