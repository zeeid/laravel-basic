<?php

namespace App\Http\Controllers;

use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }
    public function login(Request $request){
        // dd($request->all());

        $jml_data = LoginModel::where('email',$request->email)
        ->where('password',$request->password)
        ->count();

        if ($jml_data > 0) {
            $select = LoginModel::where('email',$request->email)
            ->where('password',$request->password)
            ->get();

            // dd($select[0]['nama']);

            // === SIMPAN SESSION====
            Session::put([
                'is_login'  => 'YES',
                'is_admin'  => $select[0]['role'],
                'nama'      => $select[0]['nama'],
                'email'     => $select[0]['email'],
                'role'      => $select[0]['role'],
                'password'  => $select[0]['password'],
            ]);

            return 'MASOOK';

        }else{
            return 'NO';
        }


        // $coba = Session::get('is_admin');

        // echo $coba;
    }

    public function logout(){
        Session::flush(); 
        return view('login.index');
    }
}
