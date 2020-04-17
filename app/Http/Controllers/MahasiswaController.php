<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MahasiswaController extends Controller
{
    public function index(Request $request){
    	$user = user::when($request->search, function($query) use($request){
            $query->where('nama_user', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nik', 'LIKE', '%'.$request->search.'%');
        })->where('role', '=', 'mahasiswa')->paginate(100);
    	return view('Mahasiswa.index', compact('user'));
    }

    public function api(){
        $user = User::select('id', 'nama_user', 'email', 'role', 'nim', 'angkatan', 'fakultas')->where('role','mahasiswa')->get();
        $json = response()->json(array('result' => $user));
        return $json;
    }

    public function create(Request $request){
    	$user = new User;
    	$user->nama_user = $request->nama_user;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->role = 'mahasiswa';
    	$user->nim = $request->nim;
    	$user->angkatan = $request->angkatan;
    	$user->fakultas = $request->fakultas;
    	$user->save();
    	return redirect('/mahasiswa')->with('message', 'Data Mahasiswa berhasil ditambahkan!');
    }

    public function delete($id){
    	$user = User::findOrFail($id);
    	$user->delete();
    	return redirect('/mahasiswa')->with('message', 'Data Mahasiswa berhasil dihapus!');
    }

    public function editProfile($id){
    	$user = User::findOrFail($id);
    	return view('Mahasiswa.editProfile', compact('user'));
    }

    public function updateProfile($id, Request $request){
    	$user = User::find($id);
    	$user->nama_user = $request->nama_user;
    	$user->email = $request->email;
    	$user->password = $request->password;
    	$user->nim = $request->nim;
    	$user->angkatan = $request->angkatan;
    	$user->fakultas = $request->fakultas;
    	$user->save();
    	return redirect('/mahasiswa')->with('message', 'Data Mahasiswa berhasil Diperbarui!');
    }

    public function editPass($id){
    	$user = User::findOrFail($id);
    	return view('Mahasiswa.editPassword', compact('user'));
    }

    public function updatePass($id, Request $request){
    	$user = User::find($id);
    	if($request->password == $user->password){
            return redirect('/mahasiswa')->with('error', 'Tidak ada perubahan pada Password!');
        }else{
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('/mahasiswa')->with('message', 'Password berhasil diubah!');
        }
    }
}
