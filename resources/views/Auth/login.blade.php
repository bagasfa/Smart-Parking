@extends('layouts.main')

@section('content')
<marquee direction="left" scrollamount="20"><h1>تسجيل الدخول</h1></marquee>
<marquee direction="right" scrollamount="20"><h1>Авторизоваться</h1></marquee>
<marquee direction="left" scrollamount="20"><h1>Mlebu</h1></marquee>
<marquee direction="right" scrollamount="20"><h1>เข้าสู่ระบบ</h1></marquee>
<marquee direction="left" scrollamount="20"><h1>ログインする</h1></marquee>
<marquee direction="right" scrollamount="20"><h1>Anmeldung</h1></marquee>
<marquee direction="left" scrollamount="20"><h1>लॉग इन करें</h1></marquee>
<marquee direction="right" scrollamount="20"><h1>Idħol</h1></marquee>
<marquee direction="left" scrollamount="20"><h1>Σύνδεση</h1></marquee>
<marquee direction="right" scrollamount="20"><h1>로그인</h1></marquee>
<marquee direction="left" scrollamount="20"><h1>Ngena ngemvume</h1></marquee>
<marquee direction="left" scrollamount="20"><h1>Σύνδεση</h1></marquee>
<marquee direction="right" scrollamount="20"><h1>로그인</h1></marquee>
<marquee direction="left" scrollamount="20"><h1>Ngena ngemvume</h1></marquee>

<div class="container min-vh-95 mt-5">

  <div class="bglogin">
    <img src="{{url('assets/img/logo.png')}}" width="120">
  </div>
    <div class="login-form center mb-5">
      <h1>&nbsp;</h1>

      <form method="POST" action="{{ url('/postLogin') }}" autocomplete="off">
        {{ csrf_field() }}
        <marquee direction="up" behavior="slide" scrollamount="7">
        <div class="form-label-group mt-7">
          <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
        </div>
        </marquee>

        <marquee direction="up" behavior="slide" scrollamount="10.5">
        <div class="input-group mt-3" id="show_hide_password">
          <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-addon eye">
              <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
          </div>
        </div></marquee>
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