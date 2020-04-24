@extends('Layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Edit Mahasiswa";
  document.getElementById('mahasiswa').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>
      Mahasiswa <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('/mahasiswa') }}"> 
              <button type="button" class="btn btn-outline-danger">
                <i class="fas fa-arrow-circle-left"></i> Kembali
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ url('/mahasiswa/'.$user->id.'/updateProfile') }}" method="POST">
              @csrf
              <div class="form-group">
                  <label for="inputNIK">NIM</label>
                  <input name="nim" type="text" pattern="\d*" maxlength="15" class="form-control" id="inputNIM" placeholder="Nomor Induk Mahasiswa" value="{{ $user->nim }}" required="">
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
                  <label for="inputAngkatan">Angkatan <i style="color: red;">*</i></label>
                  <input name="angkatan" type="number" maxlength="4" class="form-control" id="inputAngkatan" value="{{ $user->angkatan }}" placeholder="Angkatan" required="">
              </div>
              <div class="form-group">
                  <label for="inputFakultas">Fakultas <i style="color: red;">*</i></label>
                  <select name="fakultas" class="form-control" required="">
                    <option value="{{ $user->fakultas }}" hidden="">Selected : {{ $user->fakultas }}</option>
                    <option value="Fakultas Ekonomi Bisnis">Fakultas Ekonomi Bisnis</option>
                    <option value="Fakultas Hukum">Fakultas Hukum</option>
                    <option value="Fakultas Ilmu Administrasi">Fakultas Ilmu Administrasi</option>
                    <option value="Fakultas Ilmu Budaya">Fakultas Ilmu Budaya</option>
                    <option value="Fakultas Ilmu Kelautan">Fakultas Ilmu Kelautan</option>
                    <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                    <option value="Fakultas Ilmu Sosial dan Ilmu Politik">Fakultas Ilmu Sosial dan Ilmu Politik</option>
                    <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                    <option value="Fakultas Kedokteran Gigi">Fakultas Kedokteran Gigi</option>
                    <option value="Fakultas Kedokteran Hewan">Fakultas Kedokteran Hewan</option>
                    <option value="Fakultas Matematika dan Ilmu Pengetahuan Alam">Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
                    <option value="Fakultas Pendidikan Vokasi">Fakultas Pendidikan Vokasi</option>
                    <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                    <option value="Fakultas Peternakan">Fakultas Peternakan</option>
                    <option value="Fakultas Teknik">Fakultas Teknik</option>
                    <option value="Fakultas Teknologi Pertanian">Fakultas Teknologi Pertanian</option>
                  </select>
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