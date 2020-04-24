@extends('Layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Petugas";
  document.getElementById('petugas').classList.add('active');
</script>
<section class="section">

  <div class="section-header">
    <marquee scrollamount="150" behavior="slide"><h1>Petugas</h1></marquee>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <marquee direction="down" scrollamount="50" behavior="slide">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Cari NIK / Nama" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>
            <a href="{{ url('/petugas') }}">
                <button class="btn btn-success">Show All</button>
            </a>
          </div>
          <div class="card-header">
            <button type="button" data-toggle="modal" data-target="#addData" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Petugas</button>
          </div>
          </marquee>
          <marquee direction="up" scrollamount="50" behavior="slide">
          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col" width="100px"><center>#</center></th>
                  <th scope="col">NIK</th>
                  <th scope="col">Nama Lengkap</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">No. Telpon</th>
                  <th scope="col">Alamat</th>
                  <th scope="col"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                @forelse($user as $key => $petugas)
                <tr>
                  <td align="center">{{ $user->firstItem() + $key }}</td>
                  <td>{{ $petugas->nik }}</td>
                  <td>{{ $petugas->nama_user }}</td>
                  <td>{{ $petugas->email }}</td>
                  <td>{{ $petugas->telfon }}</td>
                  <td>{{ $petugas->alamat }}</td>
                  <td align="center">
                    <a href="{{url('petugas/'.$petugas->id. '/edit')}}">
                      <button type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="fas fa-edit"></i>
                      </button>
                    </a>
                    &nbsp;
                    <a href="{{url('petugas/'.$petugas->id. '/delete')}}">
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
          </div>
          </marquee>
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
            <h5 class="modal-title" id="DataLabel">Tambah Petugas</h5>
          </div>
          <div class="modal-body">
        <form action="{{url('/petugas/create')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputNIK">NIK <i style="color: red;">*</i></label>
            <input name="nik" type="text" pattern="\d*" maxlength="16" class="form-control" id="inputNIK" placeholder="Nomor Induk Kependudukan" required="">
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
              <a href=""><div class="input-group-addon eye">
                <i class="fa fa-eye-slash" aria-hidden="true"></i>
              </div></a>
            </div>
        </div>
        <div class="form-group">
            <label for="inputTelp">No. Telpon <i style="color: red;">*</i></label>
            <input name="telfon" type="tel" maxlength="12" class="form-control" id="inputTelp" placeholder="Nomor Telpon" required="">
        </div>
        <div class="form-group">
            <label for="inputAlamat">Alamat <i style="color: red;">*</i></label>
            <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap" rows="6" required=""></textarea>
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
