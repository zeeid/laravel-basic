<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request, $idtest =false){
        // dd($request->all());    
        $menunya = $request->menunya;

        if ($menunya =='Setting Biaya') {
            return view('dashboard.settingbiaya');
        }
        elseif ($menunya =='Tambah Jenis dan Biaya') {

            $data = [
                'judul' => $menunya,
            ];

            return view('dashboard.form.fsettingbiaya', $data);
        }
        else{
            echo "404";
            die();
        }
    }
}
