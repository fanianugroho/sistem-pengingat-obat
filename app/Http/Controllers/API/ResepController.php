<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ObatResep;

class ResepController extends Controller
{
    public function index()
    {
        $data = ObatResep::with('obat','resep.pasien')->get();
        if($data){
            return response()->json([
            "status" => "success",
            "message" => "data berhasil di tampilkan",
            "data" => $data,
            
        ]);
    
        } else {
            return response()->json([
                "status" => 'failed' ,
                "message" => 'data gagal di tampilkan',
                "data" => null,
            ]);
        }
    }

    
    public function getIdResep($id)
    {
        $data = ObatResep::with('obat','resep.pasien')->where('id_resep',$id)->get();
        if($data){
            return response()->json([
            "status" => "success",
            "message" => "data berhasil di tampilkan",
            "data" => $data,
            
        ]);
    
        } else {
            return response()->json([
                "status" => 'failed' ,
                "message" => 'data gagal di tampilkan',
                "data" => null,
            ]);
        }
    }

}
