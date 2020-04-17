@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Petugas <small>Edit Password</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('/petugas') }}"> 
              <button type="button" class="btn btn-outline-danger">
                <i class="fas fa-arrow-circle-left"></i> Kembali
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ url('/petugas/'.$user->id.'/updatePass') }}" method="POST">
              @csrf
              <div class="form-group">
                  <label for="inputPassword">Password <i style="color: red;">*</i></label>
                  <div class="input-group" id="show_hide_password">
                    <input name="password" type="password" minlength="8" class="form-control" id="inputPassword" placeholder="Password" value="{{ $user->password }}" required="">
                  <div class="input-group-addon eye">
                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                  </div>
              </div>
              <div class="form-group">
                  <input type="hidden" name="nama_user" value="{{ $user->nama_user }}">
                  <input type="hidden" name="email" value="{{ $user->email }}">
                  <input type="hidden" name="nik" value="{{ $user->nik }}">
                  <input type="hidden" name="telfon" value="{{ $user->telfon }}">
                  <input type="hidden" name="alamat" value="{{ $user->alamat }}">
                  <br>
                  <span style="font-size: 12px;"><i style="color: red;"> * </i> : Password Ter-Enkripsi menggunakan metode <a href="https://en.wikipedia.org/wiki/Bcrypt"><i>bCrypt</i></a>, Jadi berhati-hatilah menggantinya.</span>
              </div>
              <br>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection