<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SettingJenisBiaya;
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

            $id     = $request->id;
            $select = '';
            if ($id !='') {
                // === JIKA MEMBAWA DATA===
                // $selectx = SettingJenisBiaya::where('id',$id)->get();
                $select = SettingJenisBiaya::where('id',$id)->get();
                // $select = json_decode(json_encode($selectx), true);
            }


            $data = [
                'judul' => $menunya,
                'list_tarif' =>$select,
            ];

            return view('dashboard.form.fsettingbiaya', $data);
        }
        elseif ($menunya =='Parkir') {

            // $id     = $request->id;
            // $select = '';
            // if ($id !='') {
            //     // === JIKA MEMBAWA DATA===
            //     // $selectx = SettingJenisBiaya::where('id',$id)->get();
            //     $select = SettingJenisBiaya::where('id',$id)->get();
            //     // $select = json_decode(json_encode($selectx), true);
            // }


            $data = [
                'judul' => $menunya,
                // 'list_tarif' =>$select,
            ];

            return view('dashboard.t_parkir', $data);
        }
        elseif ($menunya =='Tambah Transaksi Parkir') {

            // $id     = $request->id;
            // $select = '';
            // if ($id !='') {
            //     // === JIKA MEMBAWA DATA===
            //     // $selectx = SettingJenisBiaya::where('id',$id)->get();
            //     $select = SettingJenisBiaya::where('id',$id)->get();
            //     // $select = json_decode(json_encode($selectx), true);
            // }

            $select = SettingJenisBiaya::all();

            $data = [
                'judul' => $menunya,
                'list_tarif' =>$select,
            ];

            return view('dashboard.form.f_parkir', $data);
        }
        else{
            echo "404";
            die();
        }
    }
}
