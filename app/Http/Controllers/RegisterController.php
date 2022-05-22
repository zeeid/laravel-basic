<?php

namespace App\Http\Controllers;

use App\Models\Pengguna as ModelsPengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


// use App\Pengguna;

class RegisterController extends Controller
{
    public function index(){
        return view('login.register');
    }

    public function show()
    {
        // $select = ModelsPengguna::paginate(2);
        // $select = ModelsPengguna::all();
        // $select = ModelsPengguna::find(1);
        // $select = ModelsPengguna::where('nama','asdsad')->get();

        $coba = DB::table('user')->get();
    //     dd(DB::select(DB::raw(" 
    //     SELECT COUNT(*) AS result
    //     FROM user"
    // )));
        dd($coba);
        
        // dd($select);

    }   
    public function delete()
    {        
        // $update = ModelsPengguna::destroy(1);
        ModelsPengguna::where('id',2)
        ->where('nama','asdf')
        ->delete();

        // dd($a);
    }

    public function update()
    {
        $update = ModelsPengguna::find(1);
        $update->update([
            'nama'=>'UPDATeeee'
        ]);

    //     where('active', 1)
    //   ->where('destination', 'San Diego')
    //   ->update(['delayed' => 1]);
        
    }
    public function pendaftaran(Request $request)
    {
        
        // // === GET ALL DATA POST ===
        // return $request->all();

        // DB::table('user')->insert([
        //     'nama'=>$request->username,
        //     'email'=>$request->email,
        //     'password'=>$request->password,
        // ]);

        $coba = ModelsPengguna::create([
            'nama'=>$request->username,
                'email'=>$request->email,
                'password'=>$request->password,
        ]);

        // ModelsPengguna::create();

        // ==== Validasi====
        // $validated = $request->validate([
        //     'username' => 'required|max:255',
        //     'email' => 'required|email:dns|unique:users',
        //     'password' => 'required|min:5|max:255',
        // ]);

        dd('OKE');
    }
}
