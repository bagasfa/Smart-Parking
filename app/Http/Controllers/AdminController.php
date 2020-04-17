<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index(){
    	$user = User::where('role','admin')->paginate(100);
    	return view('Admin.index', compact('user'));
    }

    public function api(){
       $user = User::select('id', 'nama_user', 'email', 'role', 'nik', 'telfon', 'alamat')->where('role','admin')->get();
        $json = response()->json(array("result" => $user));
        return $json; 
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
    	$user->role = 'admin';
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
        $user->nama_user = $request->nama_user;
        $user->email = $request->email;
        $user->role = 'admin';
        $user->nik = $request->nik;
        $user->telfon = $request->telfon;
        $user->alamat = $request->alamat;
        if($request->password == $user->password){
            $user->password = $request->password;
            $user->save();
            return redirect('/admin')->with('error', 'Tidak ada perubahan pada Password!');
        }else{
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('/admin')->with('message', 'Password berhasil diubah!');
        }
    }
}
