<?php

namespace App\Http\Controllers;
use App\Resep;
use App\Pasien;
use App\Obat;
use App\ObatResep;
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
    public function all()
    {
        $data = Resep::with('obatResep.obat')->get();
        // dd($data);
	    return $data;
    }

    public function tambahresep (){
        $nama_obat = Obat::all();
        return view('resep.tambahResep',compact('nama_obat'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function store(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'id_pasien' => 'required',
            'dosis' => 'required',
            'aturan_pakai' => 'required',
            'takaran_minum' => 'required',
            'waktu_minum' => 'required',
            'keterangan' => 'required',
            'jml_obat' => 'required',
            'jml_kali_minum' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'Failed',
                'message' => $validator->messages()
            ],422);
        }
        DB::beginTransaction();
        try {
            $resep = New Resep;
            $resep->id_pasien = $request->id_pasien;
            $resep->id_users = $user->id;
            $resep->dosis = $request->dosis;
            $resep->aturan_pakai = $request->aturan_pakai;
            $resep->takaran_minum = $request->takaran_minum;
            $resep->waktu_minum = $request->waktu_minum;
            $resep->keterangan = $request->keterangan;
            $resep->jml_obat = $request->jml_obat;
            $resep->jml_kali_minum = $request->jml_kali_minum;
            $resep->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        try {
            $obatResep = New ObatResep;
            $obatResep->id_resep = $resep->id;
            $obatResep->id_obat = $request->id_obat;
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
        $request->validate([
            'id_pasien' => 'required',
            'id_obat' => 'required',
            'dosis' => 'required',
            'aturan_pakai' => 'required',
            'takaran_minum' => 'required',
            'waktu_minum' => 'required',
            'keterangan' => 'required',
            'jml_obat' => 'required',
            'jml_kali_minum' => 'required',
        ]);

        $resep = Resep::findOrFail($id);
        
        DB::beginTransaction();
        try {
            $resep->id_pasien = $request->id_pasien;
            $resep->id_users = $user->id;
            $resep->dosis = $request->dosis;
            $resep->aturan_pakai = $request->aturan_pakai;
            $resep->takaran_minum = $request->takaran_minum;
            $resep->waktu_minum = $request->waktu_minum;
            $resep->keterangan = $request->keterangan;
            $resep->jml_obat = $request->jml_obat;
            $resep->jml_kali_minum = $request->jml_kali_minum;
            $resep->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil merubah obat'
        ]); 
       
        // return Resep::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Resep::find($id)->delete();
    }

    public function cetakPdf()
    {
    	$resep = Resep::with('obatResep')->get();
        $qr = QrCode::format('png')->size(100)->errorCorrection('H')->generate('A basic example of QR code! Nicesnippets.com');
    	$pdf = PDF::loadview('resep.resep_pdf',['resep'=>$resep, 'qr' => $qr])->setPaper('b7', 'landscape');
    	return $pdf->stream();
    }
}
