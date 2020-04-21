@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Mahasiswa";
  document.getElementById('mahasiswa').classList.add('active');
</script>
<section class="section">

  <div class="section-header">
    <marquee scrollamount="150" behavior="slide"><h1>Mahasiswa</h1></marquee>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <marquee direction="down" scrollamount="25" behavior="slide">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Cari NIM / Nama" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>
            <a href="{{ url('/mahasiswa') }}">
                <button class="btn btn-success">Show All</button>
            </a>
          </div>
          <div class="card-header">
            <button type="button" data-toggle="modal" data-target="#addData" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Mahasiswa</button>
          </div>
          </marquee>
          <marquee direction="up" scrollamount="60" behavior="slide">
          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col" width="100px"><center>#</center></th>
                  <th scope="col">NIM</th>
                  <th scope="col">Nama Lengkap</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Angkatan</th>
                  <th scope="col">Fakultas</th>
                  <th scope="col"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                @forelse($user as $key => $mahasiswa)
                <tr>
                  <td align="center">{{ $user->firstItem() + $key }}</td>
                  <td>{{ $mahasiswa->nim }}</td>
                  <td>{{ $mahasiswa->nama_user }}</td>
                  <td>{{ $mahasiswa->email }}</td>
                  <td>{{ $mahasiswa->angkatan }}</td>
                  <td>{{ $mahasiswa->fakultas }}</td>
                  <td align="center">
                    <a href="{{url('mahasiswa/'.$mahasiswa->id. '/editProfile')}}">
                      <button type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit Profile">
                        <i class="fas fa-edit"></i> Profile
                      </button>
                    </a>
                    <a href="{{url('mahasiswa/'.$mahasiswa->id. '/editPass')}}">
                      <button type="button" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Edit Password">
                        <i class="fas fa-edit"></i> Password
                      </button>
                    </a>
                    <a href="{{url('mahasiswa/'.$mahasiswa->id. '/delete')}}">
                      <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fas fa-trash"></i>
                      </button>
                    </a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="7"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="pull-right">{{ $user->links() }}</div>
          </div></marquee>
          <div class="card-footer text-right">
            <nav class="d-inline-block">

            </nav>
          </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addData" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="DataLabel">Tambah Mahasiswa</h5>
          </div>
          <div class="modal-body">
        <form action="{{url('/mahasiswa/create')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputNIM">NIM <i style="color: red;">*</i></label>
            <input name="nim" type="text" pattern="\d*" maxlength="15" class="form-control" id="inputNIM" placeholder="Nomor Induk Mahasiswa" required="">
        </div>
        <div class="form-group">
            <label for="inputNama">Nama Lengkap <i style="color: red;">*</i></label>
            <input name="nama_user" type="text" class="form-control" id="inputNama" placeholder="Nama Lengkap" required="">
        </div>
        <div class="form-group">
            <label for="inputEmail">E-mail <i style="color: red;">*</i></label>
            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="E-mail" required="">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password <i style="color: red;">*</i></label>
            <div class="input-group" id="show_hide_password">
              <input name="password" type="password" minlength="8" class="form-control" id="inputPassword" placeholder="Password" required="">
            <div class="input-group-addon eye">
              <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
            </div>
        </div><br>
        <div class="form-group">
            <label for="inputAngkatan">Angkatan <i style="color: red;">*</i></label>
            <input name="angkatan" type="number" maxlength="4" class="form-control" id="inputAngkatan" placeholder="Angkatan" required="">
        </div>
        <div class="form-group">
            <label for="inputFakultas">Fakultas <i style="color: red;">*</i></label>
            <select name="fakultas" class="form-control" required="">
              <option hidden="">-- Pilih Fakultas --</option>
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
        <br>
        <span style="font-size: 12px;"><i style="color: red;"> * </i> : Data harus terisi</span>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambahkan</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal -->
  </div>
</section>
@endsection
