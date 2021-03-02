<?php

namespace App\Http\Controllers;
use App\BentukObat;
use App\InteraksiObat;
use App\KontraindikasiObat;
use App\EfekSampingObat;
use App\PetunjukPenyimpananObat;
use App\FungsiObat;
use App\Obat;
use App\Fungsi;
use App\EfekSamping;
use Illuminate\Http\Request;
use DB;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data =Obat::with('bentuk_obat','kontraindikasi_obat','interaksi_obat','fungsi_obat','efek_samping_obat')->get();
//          return response()->json($data);
	    return $data;
    }
    public function detailobat ($id){
        $detailObat = Obat::with('bentuk_obat','kontraindikasi_obat','interaksi_obat','fungsi_obat','efek_samping_obat')->where('id',$id)->first();
        // dd($detailObat->kontraindikasi_obat->nama_kontraindikasi);
        return view('obat.detailObat',compact('detailObat'));
    }
    public function index()
    {
        $bentuk_obat = BentukObat::all();
        $interaksi_obat = InteraksiObat::all();
        $kontraindikasi_obat = KontraindikasiObat::all();
        $fungsi_obat = Fungsi::all();
        $efek_samping_obat = EfekSamping::all();
        return view('obat.index',compact('bentuk_obat','interaksi_obat','kontraindikasi_obat','fungsi_obat', 'efek_samping_obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $obat = New Obat;
            $obat->nama_obat = $request->nama_obat;
            $obat->id_bentuk_obat = $request->id_bentuk_obat;
            $obat->kode_obat = $request->kode_obat;
            $obat->stok = $request->stok;
            $obat->id_kontraindikasi_obat = $request->id_kontraindikasi_obat;
            $obat->id_interaksi_obat = $request->id_interaksi_obat;
            $obat->satuan = $request->satuan;
            $obat->pola_makan = $request->pola_makan;
            $obat->petunjuk_penyimpanan = $request->petunjuk_penyimpanan;
            $obat->informasi = $request->informasi;  
            $obat->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        try {
            $efekSampingObat = New EfekSampingObat;
            $efekSampingObat->id_obat = $obat->id;
            $efekSampingObat->id_efek_samping = $request->id_efek_samping_obat;
            $efekSampingObat->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        try {
            $fungsiObat = New FungsiObat;
            $fungsiObat->id_obat = $obat->id;
            $fungsiObat->id_fungsi = $request->id_fungsi_obat;
            $fungsiObat->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        DB::commit();
      
        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil menambah obat'
        ]); 
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([

            'nama_obat' => 'required',
            'id_bentuk_obat' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'id_kontraindikasi_obat' => 'required',
            'id_interaksi_obat' => 'required',
            'id_efek_samping_obat' => 'required',
            'petunjuk_penyimpanan' => 'required',
            'id_fungsi_obat' => 'required',
            'pola_makan' => 'required',
            'informasi' => 'required',
        ]);
       
       
        return Obat::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Obat::find($id)->delete();
    }
}
