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


    // API Mobile Login
    public function loginAPI(Request $request){

        $server = "localhost";
        $user = "root";
        $password = "";
        $nama_database = "smart_parking";
        $db = mysqli_connect($server, $user, $password, $nama_database);

        $sql = Auth::attempt($request->only('email','password'));
        $result = array();

        if($sql){
                $query = mysqli_query($db, $sql);
                $stat = auth()->user()->role;

                array_push($result, array('role'=>$stat));

                return response()->json(array("result"=>$result));
        }
        // Email atau Password salah
        return response()->json(array("result"=>'ERROR'));
    }

    // API Mobile logout
    public function logoutAPI(){
    	$logout = Auth::logout();
    	return response()->json(array("result"=>$logout));
    }
}
