<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Laporan;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request){
        $user = User::where('role','mahasiswa')->orderBy('nim', 'asc')->get();
        $laporan = Laporan::paginate(10);
        return view('Laporan.index', compact('laporan', 'user'));
    }

    public function create(Request $request){
        $rand = rand(111111, 999999);

    	$laporan = new Laporan;
    	$laporan->qr_code = $request->qr_code;
    	$laporan->plat_nomor = $request->plat_nomor;
        $laporan->kode_proses = "UB-".$rand;
        $laporan->masuk = date("d-m-Y H:i:s");
    	$laporan->save();
    	return redirect('/laporan')->with('message', 'Data Laporan berhasil ditambahkan!');
    }

    public function updateKeluar(Request $request, $id_laporan){
        $laporan = Laporan::find($id_laporan);
        $laporan->keluar = date("d-m-Y H:i:s");
        $laporan->save();
        return redirect('/laporan')->with('message', 'Data '.$id_laporan.' berhasil keluar!');
    }

    public function delete($id_laporan){
    	$laporan = Laporan::findOrFail($id_laporan);
    	$laporan->delete();
    	return redirect('/laporan')->with('message', 'Data Mahasiswa berhasil dihapus!');
    }

    public function export(){
        return Excel::download(new LaporanExport, 'siswa-'.date("d-m-Y").'.xlsx');
    }


    // For Mobile API

    public function createAPI(Request $request){
        $rand = rand(111111, 999999);

        $laporan = new Laporan;
        $laporan->qr_code = $request->qr_code;
        $laporan->plat_nomor = $request->plat_nomor;
        $laporan->kode_proses = "UB-".$rand;
        $laporan->masuk = date("d-m-Y H:i:s");
        $laporan->save();
        $json = response()->json(array('result' => $laporan));
        return $json;
    }

    public function updateAPI(Request $request, $id_laporan){
        $laporan = Laporan::find($id_laporan);
        $laporan->keluar = date("d-m-Y H:i:s");
        $laporan->save();
        $json = response()->json(array('result' => $laporan));
        return $json;
    }
}
