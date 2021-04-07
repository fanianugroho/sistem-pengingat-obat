<?php

namespace App\Http\Controllers;
use App\Resep;
use App\Pasien;
use App\Obat;
use App\ObatResep;
use App\BentukObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDF;
use QrCode;
use Auth;


class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all($id)
    {
        $data = ObatResep::with('resep.pasien')->select('id_resep')->groupBy('id_resep')
                ->whereHas('resep.pasien',function($q) use($id) {
                    $q->where('id_pasien',$id);
                })
                ->get();

        // $data = ObatResep::with('resep.pasien')
        // ->whereHas('resep.pasien',function($q) use($id) {
        //     $q->where('id_pasien',$id);
        // })->get();
        // $data = DB::table('obat_resep')
        //         ->select('obat_resep.*','resep.id','pasien.id')     
        //         ->join('resep', 'obat_resep.id', '=', 'resep.id')
        //         ->join('pasien', 'resep.id', '=', 'pasien.id')
        //         ->where('obat_resep.id_pasien',$id)
        //         ->get();
	    return $data;
    }

    public function viewdetailobatresep ($id){
        $bentuk_obat = BentukObat::all();
        $nama_obat = Obat::all();
        $dataResep = ObatResep::with('obat','resep')->where('id_resep',$id)->get();
        return view('resep.detailObatResep',compact('nama_obat','dataResep'));
    } 

    public function detailobatresep ($id){
        
        $data = ObatResep::with('obat.bentuk_obat','resep')->where('id_resep',$id)->get();
        return $data;
    }


    public function detailpasien ($id){
        $nama_obat = Obat::all();
        $detailPasien = Pasien::where('id', $id)->first();   
        return view('resep.detailPasien',compact('detailPasien','nama_obat'));
    }
    public function index()
    {  
        return view('resep.index');
    }
    public function getObat($id){
        $obat = Obat::where('id',$id)->first();
        return $obat;
    }

    
    public function searchPasien(Request $request)
    {
        $search = Pasien::where([
            ['nama_pasien','LIKE','%'.$request->nama_pasien .'%']
        ])
        ->where([
            ['no_rm','LIKE','%'.$request->no_rm .'%']
        ])
        ->where([
            ['tanggal_lahir','LIKE','%'.$request->tanggal_lahir .'%']
        ])
        ->where([
            ['jenis_kelamin','LIKE','%'.$request->jenis_kelamin .'%']
        ])
        ->where([
            ['alamat','LIKE','%'.$request->alamat .'%']
        ])
        ->where([
            ['no_telp','LIKE','%'.$request->no_telp .'%']
        ])
        ->get();

        return $search;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_obat(Request $request ,$id)
    {
       
        DB::beginTransaction();
        try {
            $obatResep = New ObatResep;
            $obatResep->id_resep = $id;
            $obatResep->id_obat = $request->id_obat;
            $obatResep->dosis = $request->dosis;
            $obatResep->aturan_pakai = $request->aturan_pakai;
            $obatResep->takaran_minum = $request->takaran_minum;
            $obatResep->waktu_minum = $request->waktu_minum;
            $obatResep->keterangan = $request->keterangan;
            $obatResep->jml_obat = $request->jml_obat;
            $obatResep->jml_kali_minum = $request->jml_kali_minum;
            $obatResep->save();
            
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        DB::commit();
        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil membuat obat'
        ]); 
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // $validator = Validator::make($request->all(), [
        //     'id_pasien' => 'required',
        //     'dosis' => 'required',
        //     'aturan_pakai' => 'required',
        //     'takaran_minum' => 'required',
        //     'waktu_minum' => 'required',
        //     'keterangan' => 'required',
        //     'jml_obat' => 'required',
        //     'jml_kali_minum' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 'Failed',
        //         'message' => $validator->messages()
        //     ],422);
        // }
        DB::beginTransaction();
        try {
            $resep = New Resep;
            $resep->id_pasien = $request->id_pasien;
            $resep->id_users = $user->id;
            
            $resep->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        try {
            $obatResep = New ObatResep;
            $obatResep->id_resep = $resep->id;
            $obatResep->id_obat = $request->id_obat;
            $obatResep->dosis = $request->dosis;
            $obatResep->aturan_pakai = $request->aturan_pakai;
            $obatResep->takaran_minum = $request->takaran_minum;
            $obatResep->waktu_minum = $request->waktu_minum;
            $obatResep->keterangan = $request->keterangan;
            $obatResep->jml_obat = $request->jml_obat;
            $obatResep->jml_kali_minum = $request->jml_kali_minum;
            $obatResep->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        DB::commit();
        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil membuat obat'
        ]); 
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'id_obat' => 'required',
        //     'dosis' => 'required',
        //     'aturan_pakai' => 'required',
        //     'takaran_minum' => 'required',
        //     'waktu_minum' => 'required',
        //     'keterangan' => 'required',
        //     'jml_obat' => 'required',
        //     'jml_kali_minum' => 'required',
        // ]);

        $obatResep = ObatResep::where('id',$id)->first();
        
        DB::beginTransaction();
        
        try {
            $obatResep->id_obat = $request->id_obat;
            $obatResep->dosis = $request->dosis;
            $obatResep->aturan_pakai = $request->aturan_pakai;
            $obatResep->takaran_minum = $request->takaran_minum;
            $obatResep->waktu_minum = $request->waktu_minum;
            $obatResep->keterangan = $request->keterangan;
            $obatResep->jml_obat = $request->jml_obat;
            $obatResep->jml_kali_minum = $request->jml_kali_minum;
            $obatResep->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        DB::commit();
        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil merubah obat'
        ]); 
       
        // return ObatResep::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ObatResep::find($id)->delete();
    }

    public function getExtension($array){
        $qr = QrCode::format('png')->size(100)->errorCorrection('H')->generate('l');
    	$pdf = PDF::loadview('resep.resep_pdf',['resep'=>$array, 'qr' => $qr])->setPaper('b7', 'landscape');
    	return $pdf->stream();
    }
    
    public function cetakPdf($array)
    {
        $fungsiArray = explode (",", $array); 
        $countFungsi = sizeof($fungsiArray);
        $resep = array();
        $qr = array();
        for($i = 0; $i < $countFungsi; $i++){
            $item = ObatResep::with('obat','resep.pasien')->where('id',$fungsiArray[$i])->first();
            $qr = QrCode::format('png')->size(100)->errorCorrection('H')->generate($fungsiArray[$i]);
            $resep[] = $item;
        }
    	$pdf = PDF::loadview('resep.resep_pdf',compact('resep'))->setPaper('b7', 'landscape');
        return $pdf->stream();
    }
}
