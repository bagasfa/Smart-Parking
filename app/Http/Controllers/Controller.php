<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\User;
use App\Laporan;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function dashboard(){
    	$totaladmin = User::where(['role' => 'admin'])->count();
    	$totalpetugas = User::where(['role' => 'petugas'])->count();
    	$totalmahasiswa = User::where(['role' => 'mahasiswa'])->count();
    	$totalmasuk = Laporan::count();
    	$totalkeluar = Laporan::whereNotNull('keluar')->count();
    	return view('dashboard', compact('totaladmin', 'totalpetugas', 'totalmahasiswa', 'totalmasuk', 'totalkeluar'));
    }
}
