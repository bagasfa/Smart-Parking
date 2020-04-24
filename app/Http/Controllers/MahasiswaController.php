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

    public function create(Request $request){
        $validateData = $request->validate([
            'email' => 'required|unique:user,email',
            'nim' => 'required|unique:user,nim'
        ]);
    	$user = new User;
    	$user->nama_user = $request->nama_user;
    	$user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->pass_kotlin = $request->password;
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

    public function edit($id){
    	$user = User::findOrFail($id);
    	return view('Mahasiswa.edit', compact('user'));
    }

    public function update($id, Request $request){
    	$user = User::find($id);
        $validateData = $request->validate([
            'email' => 'required|unique:user,email,'.$user->id,
            'nim' => 'required|unique:user,nim,'.$user->id
        ]);
    	$user->nama_user = $request->nama_user;
    	$user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->pass_kotlin = $request->password;
    	$user->nim = $request->nim;
    	$user->angkatan = $request->angkatan;
    	$user->fakultas = $request->fakultas;
    	$user->save();
    	return redirect('/mahasiswa')->with('message', 'Data Mahasiswa berhasil Diperbarui!');
    }

    // For Mobile api

    public function indexAPI(){
        $user = User::select('id', 'nama_user', 'email', 'role', 'nim', 'angkatan', 'fakultas')->where('role','mahasiswa')->get();
        $json = response()->json(array('result' => $user));
        return $json;
    }

    public function createAPI(Request $request){
        $user = new User;
        $user->nama_user = $request->nama_user;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->pass_kotlin = $request->password;
        $user->role = 'mahasiswa';
        $user->nim = $request->nim;
        $user->angkatan = $request->angkatan;
        $user->fakultas = $request->fakultas;
        $user->save();
        $json = response()->json(array('result' => $user));
        return $json;
    }
}
