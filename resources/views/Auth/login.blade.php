<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login Page</title>

  <!-- Logo title -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo.png')}}">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<!-- Main Body -->
<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <!-- Judul Form -->
            <h4 class="text-dark font-weight-normal">UB Inventory <span class="font-weight-bold"></span></h4>
            <!-- Sub Judul -->
            <p class="text-muted">Silahkan login untuk melakukan manajemen data.</p>
            <!-- Alert Message -->
              @if(Session::has('errors'))
                  <div class="alert alert-danger"> {{Session::get('errors')}} 
                  </div>
              @elseif(Session::has('message'))
                  <div class="alert alert-success"> {{Session::get('message')}} 
                  </div>
              @endif

              <!-- Form Login -->
            <form method="POST" action="{{ url('/postLogin') }}">
              {{csrf_field()}}
              <!-- Email -->
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail" tabindex="1" required autofocus>
              </div>
              <!-- Password -->
              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <div class="input-group" id="show_hide_password">
                  <input name="password" type="password" minlength="8" class="form-control" tabindex="2" id="inputPassword" placeholder="Password" required="">
                  <!-- Show Hide Password Component -->
                  <div class="input-group-addon eye">
                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                  </div>
                </div>
                <div class="invalid-feedback">
                  Harap Isi Password
                </div>
              </div>
              <div class="form-group text-right">
                <!-- Register Button -->
                <div class="text-left">
                  <p>Belum Punya Akun ? <a href="" data-toggle="modal" data-target="#formRegister">Daftar</a></p>
                </div>
                <!-- Login Button -->
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Masuk
                </button>
              </div>
            </form>
            <!-- Copyright -->
            <div class="text-center mt-5 text-small">
              Copyright &copy; {{ date('Y') }}
            </div>
          </div>
        </div>
        <!-- Side Running Background -->
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="{{ asset('assets/img/unsplash/login-bg.jpg') }}">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">UB Inventory</h1>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Modal -->
    <div class="modal fade" id="formRegister" tabindex="-1" role="dialog" aria-labelledby="formRegister" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <div class="modal-header">
            <h5 class="modal-title" id="RegisterLabel">Form Registrasi</h5>
          </div>
          <div class="modal-body">
            <form action="/register" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <!-- Nama -->
            <div class="form-group">
              <label for="inputNama">Nama Lengkap <i style="color: red;">*</i></label>
              <input name="nama_user" type="text" class="form-control" id="inputNama" placeholder="Nama Lengkap" required="">
            </div>
            <!-- Email -->
            <div class="form-group">
              <label for="inputEmail">Email <i style="color: red;">*</i></label>
              <input name="email" type="email" class="form-control" id="inputEmail" placeholder="E-Mail" required="">
            </div>
            <!-- Password -->
            <div class="form-group">
              <label for="inputPassword">Password <i style="color: red;">*</i></label>
              <div class="input-group" id="show_hide_password">
                <input name="password" type="password" minlength="8" class="form-control" id="inputPassword" placeholder="Password" required="">
              <div class="input-group-addon eye">
                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
              </div>
            </div>
            <!-- Hidden Role -->
            <input type="hidden" name="role" value="staff">
            <br>
            <span style="font-size: 12px;"><i style="color: red;"> * </i> : Data harus terisi</span>
          </div>
          <div class="modal-footer">
            <!-- Button -->
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Register</button>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal -->

  <!-- Online JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

  <!-- Offline JS File -->
  <script type="text/javascript" src="{{asset('assets/js/bootstrap-show-password.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/toastr.min.js')}}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <!-- Toaster -->
  <script>
    @if(Session::has('error'))
      toastr.error("{{ Session::get('error') }}");
    @endif
  </script>

</body>
</html>