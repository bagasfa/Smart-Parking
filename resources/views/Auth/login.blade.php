@extends('layouts.main')

@section('content')
<div class="container min-vh-95 mt-5">
  <div class="bglogin">
    <img src="../assets/img/logo.png">
  </div>
    <div class="login-form center mb-5">
      <h1>Log In</h1>

      @if ($message = Session::get('login_failed'))
        <center>
          <div class="alert alert-danger col-lg-8">
            <center><p>{{ $message }}</p></center>
          </div>
        </center>
      @endif

      <form method="POST" action="{{ url('/postLogin') }}" autocomplete="off">
        {{ csrf_field() }}
        <div class="form-label-group mt-7">
          <input type="text" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
          <!-- <label for="inputEmail">Email address</label> -->
        </div>

        <div class="form-label-group mt-3">
          <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
          <!-- <label for="inputPassword">Password</label> -->
        </div>
        <div class="mt-7">
          <button class="btn btn-md btn-primary btn-block" type="submit">Log in</button>
        </div>
      </form>
    </div>
</div>
@stop