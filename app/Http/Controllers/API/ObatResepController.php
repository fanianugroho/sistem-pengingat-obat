<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ObatResep;
use App\MinumObat;
use App\WaktuMinum;
use App\WaktuMakan;
use Validator;


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

    public function getJadwalObatResep($id){
        $dataResep = MinumObat::where('id_obat_resep',$id)->first();
       
        $waktuMakan = WaktuMakan::where('id_minum_obat',$dataResep->id)->get();
        $waktuMinum = WaktuMinum::where('id_minum_obat',$dataResep->id)->get();

        return response()->json([
            "status" => "success",
            "message" => "data berhasil di tampilkan",
            "waktu_makan" => $waktuMakan,
            "waktu_minum" => $waktuMinum,
        ]);
    }

    public function ubahWaktuMakan(Request $request, $id){
        
        $waktuMakan = WaktuMakan::where('id', $id)->first();

        $validator = Validator::make($request->all(), [
            'waktu' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'waktu' => $request->all(),
                'message' => $validator->errors()]);
        }
        WaktuMakan::find($id)->update($request->all());
        return response()->json([
            'status' => 'success',
            'waktu' => $request->all(),
            'message' => 'waktu makan berhasil diupdate'
        ]);

    }

    public function tambahWaktuMakan(Request $request){
        
        $validator = Validator::make($request->all(), [
            'jam_makan' => 'required',
            'waktu' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'waktu' => $request->all(),
                'message' => $validator->errors()]);
        }
        WaktuMakan::create($request->all());
        return response()->json([
            'status' => 'success',
            'waktu' => $request->all(),
            'message' => 'waktu makan berhasil ditambah'
        ]);

    }

    public function ubahWaktuMinum(Request $request,$id){

        $waktuMinum = WaktuMinum::where('id',$id)->first();

        $validator = Validator::make($request->all(), [
            'waktu' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'waktu' => $request->all(),
                'message' => $validator->errors()]);
        }
        WaktuMinum::find($id)->update($request->all());

        return response()->json([
            'status' => 'success',
            'waktu' => $request->all(),
            'message' => 'waktu minum berhasil diupdate'
        ]);
    }

    public function tambahWaktuMinum(Request $request){
        
        $validator = Validator::make($request->all(), [
            'jam_minum' => 'required',
            'waktu' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'waktu' => $request->all(),
                'message' => $validator->errors()]);
        }
        WaktuMinum::create($request->all());
        return response()->json([
            'status' => 'success',
            'waktu' => $request->all(),
            'message' => 'waktu minum berhasil ditambah'
        ]);

    }

    public function destroyWaktuMakan($id)
    {
        WaktuMakan::find($id)->delete();

        return response()->json([
            "status" => "success",
            "message" => "data berhasil di hapus"
        ]);
    }

    public function destroyWaktuMinum($id)
    {
        WaktuMinum::find($id)->delete();

        return response()->json([
            "status" => "success",
            "message" => "data berhasil di hapus"
        ]);
    }

}
