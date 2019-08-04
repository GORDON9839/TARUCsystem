@extends("layouts.faculty_admin")
@section("content")
<div id="main" class="wrapper style1"></div>
    <div class="contatiner">
    <section id="content"></section>
    <form method="POST" action="{{ route('register') }}">
        @csrf


            <label for="name" class="">{{ __('Name') }}</label>

        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="email" class="">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row">
            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

            <div class="col-md-6">
                <select class="form-control" name="role" id="role">
                    <option value="admin">ADMIN</option>
                    <option value ="staff">STAFF</option>
                </select>
            </div>
        </div>
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


        <div class="form-group row">
            <label for="create_for" class="col-md-4 col-form-label text-md-right">{{ __('Create For') }}</label>

            <div class="col-md-6">
                <select onchange="changeText()" class="form-control" name="create_for" id="create_for">
                    <option value="">Please Choose One</option>
                    <option value="faculty">FACULTY</option>
                    <option value ="department">DEPARTMENT</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="ddl_create_for" id="reference_id_text" style="visibility: visible" class="col-md-4 col-form-label text-md-right">Choose one</label>

            <div class="col-md-6">
                <select  class="form-control" name="ddl_create_for" id="ddl_create_for">
                    @foreach($faculty as $f)
                        <option value ="{{$f->faculty_id}}">{{$f->faculty_short_name}}</option>
                    @endforeach
                    @foreach($department as $d)
                        <option value ="{{$d->department_id}}">{{$d->department_short_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
