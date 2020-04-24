@extends('Layouts.main')

@section('content')
<script type="text/javascript">
  document.title="Log in";
</script>
<div class="marquee">
  <marquee direction="left" scrollamount="20"><h1 class="text-info">تسجيل الدخول</h1></marquee>
  <marquee direction="right" scrollamount="20"><h1 class="text-secondary">Авторизоваться</h1></marquee>
  <marquee direction="left" scrollamount="20"><h1 class="text-info">Mlebu</h1></marquee>
  <marquee direction="right" scrollamount="20"><h1 class="text-secondary">เข้าสู่ระบบ</h1></marquee>
  <marquee direction="left" scrollamount="20"><h1 class="text-info">ログインする</h1></marquee>
  <marquee direction="right" scrollamount="20"><h1 class="text-secondary">Anmeldung</h1></marquee>
  <marquee direction="left" scrollamount="20"><h1 class="text-info">लॉग इन करें</h1></marquee>
  <marquee direction="right" scrollamount="20"><h1 class="text-secondary">Idħol</h1></marquee>
  <marquee direction="left" scrollamount="20"><h1 class="text-info">Σύνδεση</h1></marquee>
  <marquee direction="right" scrollamount="20"><h1 class="text-secondary">로그인</h1></marquee>
  <marquee direction="left" scrollamount="20"><h1 class="text-info">Masuk</h1></marquee>
  <marquee direction="right" scrollamount="20"><h1 class="text-secondary">Σύνδεση</h1></marquee>
  <marquee direction="left" scrollamount="20"><h1 class="text-info">로그인</h1></marquee>
  <marquee direction="right" scrollamount="20"><h1 class="text-secondary">Log In</h1></marquee>
  <marquee direction="left" scrollamount="20"><h1 class="text-info">Авторизоваться</h1></marquee>
  <marquee direction="right" scrollamount="20"><h1 class="text-secondary">Accesso</h1></marquee>
  <marquee direction="left" scrollamount="20"><h1 class="text-info">Logáil isteach</h1></marquee>
  <marquee direction="right" scrollamount="20"><h1 class="text-secondary">登录</h1></marquee>
</div>

<div class="container min-vh-95 mt-5">

    <div class="login-form center mb-5">
      <div class="bglogin">
        <img src="{{url('assets/img/logo.png')}}" width="120">
      </div>
      <h1>&nbsp;</h1>

      <form method="POST" action="{{ url('/postLogin') }}" autocomplete="off">
        {{ csrf_field() }}
        <marquee direction="up" behavior="slide" scrollamount="7">
        <div class="form-label-group">
          <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
        </div>
        </marquee>

        <marquee direction="up" behavior="slide" scrollamount="10.5">
        <div class="input-group mt-3" id="show_hide_password">
          <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
          <a href=""><div class="input-group-addon eye">
              <i class="fa fa-eye-slash" aria-hidden="true"></i>
          </div></a>
        </div></marquee>
        <div class="mt-5">
          <button class="btn btn-md btn-primary btn-block" type="submit">Log in</button>
        </div>
      </form>
    </div>

    @if ($message = Session::get('errors'))
      <marquee direction="down" scrollamount="30" behavior="slide">
      <center>
        <div class="alert alert-danger col-lg-8">
          <center><p>{{ $errors }}</p></center>
        </div>
      </center>
      </marquee>
    @endif

</div>
@stop