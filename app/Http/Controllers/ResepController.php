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

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data = Resep::with('obat')->get();
        // dd($data);
	    return $data;
    }

    public function tambahresep (){
        $nama_obat = Obat::all();
        return view('resep.tambahResep',compact('nama_obat'));
    } 

    public function detailpasien ($id){
        $detailPasien = Pasien::where('id', $id)->first();   
        return view('resep.detailPasien',compact('detailPasien'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'no_resep' => 'required',
            'tanggal_resep' => 'required',
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
        if ($validator->fails()) {
            return response()->json([
                'status' => 'Failed',
                'message' => $validator->messages()
            ],422);
        }
        DB::beginTransaction();
        try {
            $resep = New Resep;
            $resep->no_resep = $request->no_resep;
            $resep->tanggal_resep = $request->tanggal_resep;
            $resep->id_pasien = $request->id_pasien;
            $resep->id_obat = $request->id_obat;
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
        return $request;
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
       
       
        return Resep::find($id)->update($request->all());
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
    	$resep = Resep::with('obat')->get();
        $qr = QrCode::format('png')->size(100)->errorCorrection('H')->generate('A basic example of QR code! Nicesnippets.com');
    	$pdf = PDF::loadview('resep.resep_pdf',['resep'=>$resep, 'qr' => $qr])->setPaper('b7', 'landscape');
    	return $pdf->stream();
    }

    public function cekPdf(){
        return QrCode::size(300)->generate('A basic example of QR code! Nicesnippets.com');
    }
}
