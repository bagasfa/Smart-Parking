<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index(Request $request){
        $user = user::when($request->search, function($query) use($request){
            $query->where('nama_user', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nik', 'LIKE', '%'.$request->search.'%');
        })->where('role', '=', 'admin')->paginate(100);
    	return view('Admin.index', compact('user'));
    }

    public function create(Request $request){
    	$user = new User;
    	$user->nama_user = $request->nama_user;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->role = 'admin';
    	$user->nik = $request->nik;
    	$user->telfon = $request->telfon;
    	$user->alamat = $request->alamat;
    	$user->save();
    	return redirect('/admin')->with('message', 'Data Admin berhasil ditambahkan!');
    }

    public function delete($id){
    	$user = User::findOrFail($id);
    	$user->delete();
    	return redirect('/admin')->with('message', 'Data Admin berhasil dihapus!');
    }

    public function editProfile($id){
    	$user = User::findOrFail($id);
    	return view('Admin.editProfile', compact('user'));
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
    	return redirect('/admin')->with('message', 'Data Admin berhasil Diperbarui!');
    }

    public function editPass($id){
    	$user = User::findOrFail($id);
    	return view('Admin.editPassword', compact('user'));
    }

    public function updatePass($id, Request $request){
    	$user = User::find($id);
        if($request->password == $user->password){
            return redirect('/admin')->with('error', 'Tidak ada perubahan pada Password!');
        }else{
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('/admin')->with('message', 'Password berhasil diubah!');
        }
    }
}
