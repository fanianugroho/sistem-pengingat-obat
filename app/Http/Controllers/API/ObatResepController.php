<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ObatResep;

class ObatResepController extends Controller
{
    public function getIdObatResep($id){
        $data['obat_resep'] = ObatResep::with('obat.fungsi_obat.fungsi',
                                'obat.efek_samping_obat.efek_samping',
                                'obat.interaksi_obat.interaksi',
                                'obat.kontraindikasi_obat.kontraindikasi',
                                'obat.bentuk_obat',
                                'resep.pasien')->where('id',$id)->get();
                                
            if(count($data)==1){
                return response()->json([
                "status" => "success",
                "message" => "data berhasil di tampilkan",
                "data" => $data,
                ]);
            } 
            else {
                return response()->json([
                    "status" => 'failed' ,
                    "message" => 'data gagal di tampilkan'
                ]);
            }
    }
}
