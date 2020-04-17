<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
    // Halaman Login
    public function index(){
    	return view('Auth.login');
    }

    // Proses Login
    public function postLogin(Request $request){
        // Checking Email dan Password
    	if(Auth::attempt($request->only('email','password'))){

    		if(auth()->user()->role == 'petugas'){
    			return redirect('/')->with('error', 'Silahkan Login sebagai Petugas di Aplikasi Mobile !');
    		}else if(auth()->user()->role == 'mahasiswa'){
    			return redirect('/')->with('error', 'Silahkan Login sebagai Mahasiswa di Aplikasi Mobile !');
    		}else{

            // Jika Berhasil Login
    		return redirect('/dashboard')->with('message', 'Welcome :)');
    		}
    	}
    	// Email atau Password salah
    	return redirect('/')->with('errors', 'Email atau Password anda Salah!');
    }

    // Proses Logout
    public function logout(){
    	Auth::logout();
    	return redirect('/')->with('error', 'Goodbye :(');
    }
}
