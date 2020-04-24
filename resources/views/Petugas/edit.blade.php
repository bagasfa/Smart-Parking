@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Edit Petugas";
  document.getElementById('petugas').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>
      Petugas <small>Edit Data</small>
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
            <form action="{{ url('/petugas/'.$user->id.'/update') }}" method="POST">
              @csrf
              <div class="form-group">
                  <label for="inputNIK">NIK</label>
                  <input name="nik" type="text" pattern="\d*" maxlength="16" class="form-control" id="inputNIK" placeholder="Nomor Induk Kependudukan" value="{{ $user->nik }}" required="">
              </div>
              <div class="form-group">
                  <label for="inputNama">Nama Lengkap</label>
                  <input name="nama_user" type="text" class="form-control" id="inputNama" placeholder="Nama Lengkap" value="{{ $user->nama_user }}" required="">
              </div>
              <div class="form-group">
                  <label for="inputEmail">E-mail</label>
                  <input name="email" type="email" class="form-control" id="inputEmail" placeholder="E-mail" value="{{ $user->email }}" required="">
              </div>
              <div class="form-group">
                  <label for="inputPassword">Password <i style="color: red;">*</i></label>
                  <div class="input-group" id="show_hide_password">
                    <input name="password" type="password" minlength="8" class="form-control" id="inputPassword" placeholder="Password" value="{{ $user->pass_kotlin }}" required="">
                    <a href=""><div class="input-group-addon eye">
                      <i class="fa fa-eye-slash" aria-hidden="true"></i>
                    </div></a>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputTelp">No. Telpon</label>
                  <input name="telfon" type="tel" maxlength="12" class="form-control" id="inputTelp" placeholder="Nomor Telpon" value="{{ $user->telfon }}" required="">
              </div>
              <div class="form-group">
                  <label for="inputAlamat">Alamat</label>
                  <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap" rows="6" required="">{{ $user->alamat }}</textarea>
              </div>
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