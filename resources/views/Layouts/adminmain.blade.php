<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title></title>

  <!-- Logo title -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo.png')}}">

  <!-- Online CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Offline CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hai, {{auth()->user()->nama_user}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{url('/profile')}}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{url('/logout')}}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <!-- Side Bar -->
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/dashboard"><img src="{{asset('assets/img/logo.png')}}" width="25px"> Smart Parking</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard"><img src="{{asset('assets/img/logo.png')}}" width="25px"></a>
          </div>
          <ul class="sidebar-menu">

            <!-- List Menu Sebagai Admin -->

              <li id="dashboard" class="">
                <a class="nav-link" href="{{url('/dashboard')}}"><i class="far fa-circle"></i> <span>Dashboard</span></a>
              </li>
              <hr class="sidebar-divider my-0">
              <li id="admin" class="">
                <a class="nav-link" href="{{url('/admin')}}"><i class="far fa-circle"></i> <span>Admin</span></a>
              </li>
              <li id="petugas" class="">
                <a class="nav-link" href="{{url('/petugas')}}"><i class="far fa-circle"></i> <span>Petugas</span></a>
              </li>
              <li id="mahasiswa" class="">
                <a class="nav-link" href="{{url('/mahasiswa')}}"><i class="far fa-circle"></i> <span>Mahasiswa</span></a>
              </li>
              <hr class="sidebar-divider my-0">
              <li id="laporan" class="">
                <a class="nav-link" href="{{url('/laporan')}}"><i class="far fa-circle"></i> <span>Laporan</span></a>
              </li>

          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>

      <!-- Footer -->
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <script>document.write(new Date().getFullYear());</script> <div class="bullet"></div> Developed by <a href="https://www.instagram.com/_nfakhrian/" target="blank">N</a><a href="https://www.instagram.com/bagasfaf/" target="blank">B</a><a href="https://www.instagram.com/msvbill/" target="blank">-</a><a href="https://www.instagram.com/_kazekuri/" target="blank">3</a> <a href="https://ub.ac.id/" target="blank">UB</a>
        </div>
      </footer>
    </div>
  </div>

  <!-- Online JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


  <!-- Offline JS File -->
  <script type="text/javascript" src="{{asset('assets/js/bootstrap-show-password.js')}}"></script>
  <script src="{{asset('js/toastr.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <!-- Jam -->
  <script type="text/javascript">
    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
      document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
    </script>

  <!-- Toaster -->
  <script>
    @if(Session::has('message'))
      toastr.success("{{ Session::get('message') }}");
    @elseif(Session::has('error'))
      toastr.error("{{ Session::get('error') }}");
    @endif
  </script>

</body>
</html>
