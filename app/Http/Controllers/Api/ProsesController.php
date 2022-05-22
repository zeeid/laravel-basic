<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SettingJenisBiaya;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    public function simpanjenistarif(Request $request){

        // ==== Validasi====
        $validated = $request->validate([
            'jenis_kendaraan'   => 'required',
            'tarif'             => 'required|numeric',
        ]);
        
        $data = [
            'jenis_kendaraan'   => $request->jenis_kendaraan,
            'tarif'             => $request->tarif,
        ];

        $mode   = $request->mode;
        $id     = $request->id; 

        if ($mode=='UPDATE') {
            $update = SettingJenisBiaya::where('jenis_kendaraan',$request->jenis_kendaraan)
                                        ->where('id', $id)
                                        ->update($data);

            // dd($update);
            // response 0 = gagal
            if ($update == 0) {
                $response = array(
                    'status'    => 201, 
                    'pesan'     => 'Gagal Update Data', 
                    // 'data'      => $data
                );
            }else{
                $response = array(
                    'status'    => 200, 
                    'pesan'     => 'Berhasil', 
                    // 'data'      => $data
                );
            }

        }else{
            // cek data sudah ada blum
            $jml_data = SettingJenisBiaya::where('jenis_kendaraan',$request->jenis_kendaraan)
            // ->where('tarif',$request->tarif)
            ->count();
    
            if ($jml_data > 0) {
                # code...
                $response = array(
                    'status'    => 201, 
                    'pesan'     => 'Data Jenis Kendaraan dan Tarif Sudah ada!', 
                    // 'data'      => $data
                );
            }else{
                $simpan = SettingJenisBiaya::create($data);
        
                $response = array(
                    'status'    => 200, 
                    'pesan'     => 'Berhasil', 
                    // 'data'      => $data
                );
            }

        }
        return json_encode($response);
    }

    public function showjenistarif(){
        $select = SettingJenisBiaya::all();
        
        $data = [
            'list_tarif' =>$select,
        ];

        return view('dashboard.tabel.tarif',$data);
    }

    public function hapustarif(Request $request){
        $id = $request->id;

        // cek data sudah ada blum
        $jml_data = SettingJenisBiaya::where('id',$id)
        ->count();

        if ($jml_data > 0) {
            $hapus = SettingJenisBiaya::where('id',$id)
            ->delete();

            if ($hapus==1) {
                $response = array(
                    'status'    => 200, 
                    'pesan'     => 'Berhasil menghapus data', 
                    'respon'    => $hapus, 
                );
            }else{
                $response = array(
                    'status'    => 500, 
                    'pesan'     => 'Gagal menghapus data', 
                    'respon'    => $hapus, 
                );
            }
            
        }else{
            $response = array(
                'status'    => 204, 
                'pesan'     => 'Data yang ingin dihapus tidak ada', 
                'respon'    => '-', 
            );
        }

        echo json_encode($response);

    }
}
