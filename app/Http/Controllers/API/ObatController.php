<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\BentukObat;
use App\InteraksiObat;
use App\KontraindikasiObat;
use App\Obat;
use Illuminate\Http\Request;
use Validator;

class ObatController extends Controller
{
    public function index()
    {
        $data = Obat::with('bentuk_obat','kontraindikasi_obat','interaksi_obat')->get();
        return response()->json($data);
    }


    public function destroy($id)
    {
        Obat::find($id)->delete();
        return response()->json([
            "status" => "success",
            "message" => "data berhasil di hapus"
        ]);
    }
}
