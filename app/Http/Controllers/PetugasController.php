<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PetugasController extends Controller
{
    public function index(Request $request){
    	$user = user::when($request->search, function($query) use($request){
            $query->where('nama_user', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nik', 'LIKE', '%'.$request->search.'%');
        })->where('role', '=', 'petugas')->paginate(100);
    	return view('Petugas.index', compact('user'));
    }

    public function create(Request $request){
        $validateData = $request->validate([
            'email' => 'required|unique:user,email',
            'nik' => 'required|unique:user,nik'
        ]);
    	$user = new User;
    	$user->nama_user = $request->nama_user;
    	$user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->pass_kotlin = $request->password;
    	$user->role = 'petugas';
    	$user->nik = $request->nik;
    	$user->telfon = $request->telfon;
    	$user->alamat = $request->alamat;
    	$user->save();
    	return redirect('/petugas')->with('message', 'Data Petugas berhasil ditambahkan!');
    }

    public function delete($id){
    	$user = User::findOrFail($id);
    	$user->delete();
    	return redirect('/petugas')->with('message', 'Data Petugas berhasil dihapus!');
    }

    public function edit($id){
    	$user = User::findOrFail($id);
    	return view('Petugas.edit', compact('user'));
    }

    public function update($id, Request $request){
        $user = User::find($id);
        $validateData = $request->validate([
            'email' => 'required|unique:user,email,'.$user->id,
            'nik' => 'required|unique:user,nik,'.$user->id
        ]);
        $user->nik = $request->nik;
    	$user->nama_user = $request->nama_user;
    	$user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->pass_kotlin = $request->password;
    	$user->telfon = $request->telfon;
    	$user->alamat = $request->alamat;
    	$user->save();
    	return redirect('/petugas')->with('message', 'Data Petugas berhasil Diperbarui!');
    }

    // For Mobile API
    public function indexAPI(){
       $user = User::select('id', 'nama_user', 'email', 'role', 'nik', 'telfon', 'alamat')->where('role','petugas')->get();
        $json = response()->json(array('result' => $user));
        return $json;
    }
}
