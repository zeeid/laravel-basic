<?php

namespace App\Http\Controllers\Api;

use App\Models\ParkirModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ParkirController extends Controller
{
    public function index(){
        echo "i parkir";
    }

    public function simpanparkir(Request $request){
        // dd($request->all());

        $random     = Str::random(20);
        $tgl_now    = date('Y-m-d');

        // cek data sudah ada blum
        $jml_data = ParkirModel::where('no_polisi',$request->no_polisi)
        ->where('status','=',1)
        ->where('tanggal_parkir', 'like', $tgl_now.'%')
        ->count();
        // JIKA status 1 = dia masih parkir blm CO | 0 = sudah CO

        // dd($jml_data);

        if ($jml_data < 1) {
            $data = [
                'kode_parkir'       => $random,
                'no_polisi'         => $request->no_polisi,
                'jenis_kendaraan'   => $request->jenis_kendaraan,
                'waktu_masuk'       => $request->waktu_masuk,
                'waktu_keluar'      => $request->waktu_keluar,
                'tanggal_parkir'    => $tgl_now,
                'status'            => 1,
            ];
            $simpan = ParkirModel::create($data);

            $response = array(
                'status'    => 200, 
                'data'      => $simpan, 
                'pesan'     => 'Berhasil', 
            );
        }else{
            $response = array(
                'status'    => 201, 
                'data'      => '', 
                'pesan'     => 'Gagal Kendaraan Ini Masih Parkir !', 
            );

        }

        return json_encode($response);

    }

    public function showparkir(Request $request){

        // $tgl1   = '2022-05-23';
        // $tgl2   = '2022-05-23';
        $tgl1   = $request->tgl1;
        $tgl2   = $request->tgl2;

        // $select = ParkirModel::all();
        $select = ParkirModel::whereBetween('tanggal_parkir', [$tgl1, $tgl2])->get();
        
        $data = [
            'list_parkir' =>$select,
        ];

        return view('dashboard.tabel.parkir',$data);
    }

    public function bayarparkir(Request $request){
        // dd($request->all());

        // cek data sudah ada blum
        $jml_data = ParkirModel::where('kode_parkir',$request->kode_parkir)
        // ->where('tarif',$request->tarif)
        ->count();

        if ($jml_data > 0) {
            // echo "ADA";
            // $select = ParkirModel::where('kode_parkir',$request->kode_parkir)->get();
            $select = DB::table('transaksi_parkir')
            ->join('setting_tarif', 'transaksi_parkir.jenis_kendaraan', '=', 'setting_tarif.jenis_kendaraan')
            ->where('kode_parkir',$request->kode_parkir)
            ->get();

            $select = json_decode($select,true);
            // dd($select);
            
            $tanggal_parkir = $select[0]['tanggal_parkir']; 
            $tarif          = $select[0]['tarif']; 
            $waktu_masuk    = strtotime($tanggal_parkir." ".$select[0]['waktu_masuk']); 
            $waktu_keluar   = strtotime($tanggal_parkir." ".$request->waktu_keluar);

            // echo $tanggal_parkir."<BR>";
            // die();
            // echo date("Y-m-d H:i:s", $waktu_masuk);

            $diff       = $waktu_keluar - $waktu_masuk;
            //membagi detik menjadi jam
            $jam        =floor($diff / (60 * 60));
            $totaltarif = $jam*$tarif;

            $mode   = $request->mode;
            if ($mode=='get-biaya') {
                $data_x = array(
                    'jam'        => $jam, 
                    'totaltarif' => $totaltarif, 
                );
            }else{
                $data_update = [
                    'biaya'         => $totaltarif,
                    'status'        => 0,
                    'waktu_keluar'  => $request->waktu_keluar,
                    'lama_parkir'   => $jam,
                ];
                $update = ParkirModel::where('kode_parkir',$request->kode_parkir)->update($data_update);

                if($update ==1){
                    $data_x = array(
                        'status'     => 200, 
                        'pesan'      => 'Berhasil Membayar Parkir', 
                    );
                }else{
                    $data_x = array(
                        'status'     => 201, 
                        'pesan'      => 'Gagal Proses Bayar Parkir', 
                    );

                }
            }

            return json_encode($data_x);


        }else{

        }

    }
}
