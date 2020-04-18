@extends('layouts.main')

@section('content')
<div class="container min-vh-95 mt-5">
  <div class="bglogin">
    <img src="../assets/img/logo.png">
  </div>
    <div class="login-form center mb-5">
      <h1>Log In</h1>

      <form method="POST" action="{{ url('/postLogin') }}" autocomplete="off">
        {{ csrf_field() }}
        <div class="form-label-group mt-7">
          <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
        </div>

        <div class="input-group mt-3" id="show_hide_password">
          <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-addon eye">
              <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class="invalid-feedback">
                  Harap Isi Password
                </div>
        <div class="mt-5">
          <button class="btn btn-md btn-primary btn-block" type="submit">Log in</button>
        </div>
      </form>
    </div>

    @if ($message = Session::get('errors'))
        <center>
          <div class="alert alert-danger col-lg-8">
            <center><p>{{ $errors }}</p></center>
          </div>
        </center>
      @endif

</div>
@stop