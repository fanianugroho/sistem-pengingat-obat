<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pasien;


class PasienController extends Controller
{
    public function index()
    {
        $data = Pasien::all();
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
