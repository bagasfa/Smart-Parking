@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Dashboard";
  document.getElementById('dashboard').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <marquee scrollamount="150" behavior="slide"><h1>Dashboard</h1></marquee>
  </div>
  <marquee direction="up" scrollamount="50" behavior="slide"><div class="row">
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('admin')}}" class="nounderline">
      <div class="card card-primary">
        <div class="card-header">
            <i id="micon" class="fa fa-user-secret" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Admin</h4>
            <h3 align="center">{{ $totaladmin }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('petugas')}}" class="nounderline">
      <div class="card card-warning">
        <div class="card-header">
            <i id="micon" class="fa fa-user" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Patugas</h4>
            <h3 align="center">{{ $totalpetugas }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('mahasiswa')}}" class="nounderline">
      <div class="card card-info">
        <div class="card-header">
            <i id="micon" class="fa fa-users" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Mahasiswa</h4>
            <h3 align="center">{{ $totalmahasiswa }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
  </div></marquee>
  <marquee direction="up" scrollamount="50" behavior="slide"><div class="row d-flex justify-content-around">
    <div class="col-12 col-md-6 col-lg-3">
      <a href="{{url('laporan')}}" class="nounderline">
      <div class="card card-success">
        <div class="card-header">
            <i id="micon" class="fa fa-sign-in" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Kendaraan Masuk</h4>
            <h3 align="center">{{ $totalmasuk }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
      <a href="{{url('laporan')}}" class="nounderline">
      <div class="card card-danger">
        <div class="card-header">
            <i id="micon" class="fa fa-sign-out" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4 align="center">Total Kendaraan Keluar</h4>
            <h3 align="center">{{ $totalkeluar }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
  </div></marquee>
  <marquee direction="up" scrollamount="300" behavior="slide">
    <div id="clock" style="font-size: 50px; padding: 5%;" align="center"></div>
  </marquee>
  <div id="shadow" align="center" class="d-none"></div>
    
</section>
@endsection