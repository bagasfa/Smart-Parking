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

    public function api(){
       $user = User::select('id', 'nama_user', 'email', 'role', 'nik', 'telfon', 'alamat')->where('role','petugas')->get();
        $json = response()->json(array('result' => $user));
        return $json;
    }

    public function create(Request $request){
    	$user = new User;
    	$user->nama_user = $request->nama_user;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
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

    public function editProfile($id){
    	$user = User::findOrFail($id);
    	return view('Petugas.editProfile', compact('user'));
    }

    public function updateProfile($id, Request $request){
    	$user = User::find($id);
    	$user->nama_user = $request->nama_user;
    	$user->email = $request->email;
    	$user->password = $request->password;
    	$user->nik = $request->nik;
    	$user->telfon = $request->telfon;
    	$user->alamat = $request->alamat;
    	$user->save();
    	return redirect('/petugas')->with('message', 'Data Petugas berhasil Diperbarui!');
    }

    public function editPass($id){
    	$user = User::findOrFail($id);
    	return view('Petugas.editPassword', compact('user'));
    }

    public function updatePass($id, Request $request){
    	$user = User::find($id);
    	if($request->password == $user->password){
            return redirect('/petugas')->with('error', 'Tidak ada perubahan pada Password!');
        }else{
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('/petugas')->with('message', 'Password berhasil diubah!');
        }
    }
}
