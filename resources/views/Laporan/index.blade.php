@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Laporan";
  document.getElementById('laporan').classList.add('active');
</script>
<section class="section">

  <div class="section-header">
    <h1>Laporan</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Cari QR atau Plat" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                &nbsp;<button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>&nbsp;
            <a href="{{ url('/laporan') }}">
                <button class="btn btn-success">Show All</button>
            </a>
          </div>
          <div class="card-header">
            <button type="button" data-toggle="modal" data-target="#addData" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Laporan</button>&nbsp;
            <a href="{{ url('/laporan/export') }}">
                <button class="btn btn-success">Export Excel</button>
            </a>
          </div>

          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col" width="100px"><center>#</center></th>
                    <th scope="col">QR Code</th>
                    <th scope="col">Plat Nomor</th>
                    <th scope="col">Kode Proses</th>
                    <th scope="col">Masuk</th>
                    <th scope="col">Keluar</th>
                    <th scope="col"><center>Aksi</center></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($laporan as $key => $laprn)
                  <tr>
                    <td align="center">{{ $laporan->firstItem() + $key }}</td>
                    <td>{{ $laprn->qr_code }}</td>
                    <td>{{ $laprn->plat_nomor }}</td>
                    <td>{{ $laprn->kode_proses }}</td>
                    <td>{{ $laprn->masuk }}</td>
                    <td>{{ $laprn->keluar }}</td>
                    <td align="center">
                        @if($laprn->keluar == NULL)
                            <a href="{{url('laporan/'.$laprn->id_laporan. '/keluar')}}">
                                <button type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Parkir Keluar">
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </a>
                        @endif
                      &nbsp;
                      <a href="{{url('laporan/'.$laprn->id_laporan. '/delete')}}">
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
              <div class="pull-right">{{ $laporan->links() }}</div>
          </div>
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
            <h5 class="modal-title" id="DataLabel">Tambah Laporan</h5>
          </div>
        <form action="{{url('/laporan/create')}}" method="POST">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="form-group">
                    <label for="inputQR">QR Code <i style="color: red;">*</i></label>
                    <select class="form-control" id="qr_code" name="qr_code">
                        <option value="" hidden> -- Pilih QR -- </option>
                        @foreach($user as $u)
                            <option value="{{ $u->nim }}">{{ $u->nim }} - {{ $u->nama_user }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputPlat">Plat Nomor <i style="color: red;">*</i></label>
                    <input name="plat_nomor" type="text" class="form-control" id="inputNama" placeholder="Plat Nomor" required="">
                </div>
                <br>
                <span style="font-size: 12px;"><i style="color: red;"> * </i> : Data harus terisi</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
        </form>
      </div>
    </div>
    <!-- Modal -->
  </div>
</section>
@endsection
