@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Dashboard";
  document.getElementById('dashboard').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <!-- @if(auth()->user()->role == "admin")
  	<h4><marquee>Selamat Datang {{auth()->user()->nama_user}}, Di Halaman Admin</marquee></h4>
  @elseif(auth()->user()->role == "staff")
  	<h4><marquee>Selamat Datang {{auth()->user()->nama_user}}, Di Halaman Staff</marquee></h4>
  @endif -->

  <div id="clock" style="font-size: 50px; padding-top: 20%;" align="center"></div>
		
</section>
@endsection