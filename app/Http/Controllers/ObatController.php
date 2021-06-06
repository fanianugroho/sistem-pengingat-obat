<?php

namespace App\Http\Controllers;
use App\BentukObat;
use App\InteraksiObat;
use App\KontraindikasiObat;
use App\EfekSampingObat;
use App\PetunjukPenyimpananObat;
use App\FungsiObat;
use App\Obat;
use App\ObatResep;
use App\Fungsi;
use App\Interaksi;
use App\Kontraindikasi;
use App\EfekSamping;
use Illuminate\Http\Request;
use Auth;
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
        $data =Obat::with('bentuk_obat','kontraindikasi_obat.kontraindikasi','interaksi_obat.interaksi')->get();
//          return response()->json($data);
	    return $data;
    }
    public function detailobat ($id){
        $bentuk_obat = BentukObat::all();
        $interaksi_obat = Interaksi::all();
        $kontraindikasi_obat = Kontraindikasi::all();
        $fungsi_obat = Fungsi::all();
        $efek_samping_obat = EfekSamping::all();
        $detailObat = Obat::with('bentuk_obat','kontraindikasi_obat.kontraindikasi','interaksi_obat.interaksi','fungsi_obat.fungsi','efek_samping_obat.efek_samping')->where('id',$id)->first();
        return view('obat.detailObat',compact('detailObat','bentuk_obat','interaksi_obat','kontraindikasi_obat','fungsi_obat', 'efek_samping_obat'));
    }

    public function detailObatEdit($id){
        $detailObat = Obat::with('bentuk_obat','kontraindikasi_obat.kontraindikasi','interaksi_obat.interaksi','fungsi_obat.fungsi','efek_samping_obat')->where('id',$id)->first();
        return $detailObat;
    }

    public function index()
    {
        $bentuk_obat = BentukObat::all();
        // dd($bentuk_obat);
        $interaksi_obat = Interaksi::all();
        $kontraindikasi_obat = Kontraindikasi::all();
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
        $user = Auth::user();
        $request->validate([
            'nama_obat' => 'required',
            'kode_obat' => 'required',
            'id_bentuk_obat' => 'required',
            'kekuatan_sediaan' => 'required',
            'satuan' => 'required',
            'petunjuk_penyimpanan' => 'required',
        ]);

        // DE000001;

        DB::beginTransaction();
        try {
            $obat = New Obat;
            $obat->nama_obat = $request->nama_obat;
            $obat->kode_obat = $request->kode_obat;
            $obat->id_bentuk_obat = $request->id_bentuk_obat;
            $obat->kekuatan_sediaan = $request->kekuatan_sediaan;
            $obat->satuan = $request->satuan;
            $obat->petunjuk_penyimpanan = $request->petunjuk_penyimpanan;
            $obat->pola_makan = $request->pola_makan;
            $obat->informasi = $request->informasi;
            $obat->id_users = $user->id;
            $obat->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        try {
            $efekSampingObatArray = $request->input('id_efek_samping_obat');
            $countEfekSampingObat = sizeof($efekSampingObatArray);
            $itemsEfekSampingObat = array();
            for($i = 0; $i < $countEfekSampingObat; $i++){
                $item = array(
                    'id_efek_samping' => $efekSampingObatArray[$i],
                    'id_obat' =>$obat->id,
                );
                $itemsEfekSampingObat[] = $item;
            }
            EfekSampingObat::insert($itemsEfekSampingObat);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        try {
            $fungsiArray = $request->input('id_fungsi_obat');
            $countFungsi = sizeof($fungsiArray);
            $itemsFungsi = array();
            for($i = 0; $i < $countFungsi; $i++){
                $item = array(
                    'id_fungsi' => $fungsiArray[$i],
                    'id_obat' =>$obat->id,
            );
                $itemsFungsi[] = $item;
            }
            FungsiObat::insert($itemsFungsi);
            
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        try {
            $interaskiObatArray = $request->input('id_interaksi_obat');
            $countInteraksiObat = sizeof($interaskiObatArray);
            $itemsInteraksiObat = array();
            for($i = 0; $i < $countInteraksiObat; $i++){
                $item = array(
                    'id_interaksi' => $interaskiObatArray[$i],
                    'id_obat' =>$obat->id,
            );
                $itemsInteraksiObat[] = $item;
            }
            InteraksiObat::insert($itemsInteraksiObat);
            
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        try {
            $kontraindikasiObatArray = $request->input('id_kontraindikasi_obat');
            $countKontraindikasiObat = sizeof($kontraindikasiObatArray);
            $itemsKontraindikasiObat = array();
            for($i = 0; $i < $countKontraindikasiObat; $i++){
                $item = array(
                    'id_kontraindikasi' => $kontraindikasiObatArray[$i],
                    'id_obat' =>$obat->id,
            );
                $itemsKontraindikasiObat[] = $item;
            }
            KontraindikasiObat::insert($itemsKontraindikasiObat);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Update Failed', 'message' => $e->getMessage()]);
        }

        DB::commit();
      
        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil menambah obat'
        ]); 

    }

    public function update(Request $request,$id)
    {
        $obat = Obat::where('id',$id)->first();
        $request->validate([
            'nama_obat' => 'required',
            'id_bentuk_obat' => 'required',
            'kekuatan_sediaan' => 'required',
            'satuan' => 'required',
            'petunjuk_penyimpanan' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $obat->nama_obat = $request->nama_obat;
            $obat->kode_obat = $request->kode_obat;
            $obat->id_bentuk_obat = $request->id_bentuk_obat;
            $obat->kekuatan_sediaan = $request->kekuatan_sediaan;
            $obat->satuan = $request->satuan;
            $obat->petunjuk_penyimpanan = $request->petunjuk_penyimpanan;
            $obat->pola_makan = $request->pola_makan;
            $obat->informasi = $request->informasi;
            $obat->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Update Failed', 'message' => $e->getMessage()]);
        }
        try {
            FungsiObat::where('id_obat',$id)->each(function ($fungsiObat, $key) {
                $fungsiObat->delete();
            });
    
            $fungsiArray = $request->input('id_fungsi_obat');
            $countFungsi = sizeof($fungsiArray);
            $itemsFungsi = array();
            for($i = 0; $i < $countFungsi; $i++){
                $item = array(
                    'id_fungsi' => $fungsiArray[$i],
                    'id_obat' =>$id,
            );
                $itemsFungsi[] = $item;
            }
            FungsiObat::insert($itemsFungsi);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Update Failed', 'message' => $e->getMessage()]);
        }
        try {
            InteraksiObat::where('id_obat',$id)->each(function ($interaksiObat, $key) {
                $interaksiObat->delete();
            });
            
            $interaskiObatArray = $request->input('id_interaksi_obat');
            $countInteraksiObat = sizeof($interaskiObatArray);
            $itemsInteraksiObat = array();
            for($i = 0; $i < $countInteraksiObat; $i++){
                $item = array(
                    'id_interaksi' => $interaskiObatArray[$i],
                    'id_obat' =>$id,
            );
                $itemsInteraksiObat[] = $item;
            }
            InteraksiObat::insert($itemsInteraksiObat);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Update Failed', 'message' => $e->getMessage()]);
        }
        try {
            KontraindikasiObat::where('id_obat',$id)->each(function ($kontraindikasiObat, $key) {
                $kontraindikasiObat->delete();
            });
            
            $kontraindikasiObatArray = $request->input('id_kontraindikasi_obat');
            $countKontraindikasiObat = sizeof($kontraindikasiObatArray);
            $itemsKontraindikasiObat = array();
            for($i = 0; $i < $countKontraindikasiObat; $i++){
                $item = array(
                    'id_kontraindikasi' => $kontraindikasiObatArray[$i],
                    'id_obat' =>$id,
            );
                $itemsKontraindikasiObat[] = $item;
            }
            KontraindikasiObat::insert($itemsKontraindikasiObat);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Update Failed', 'message' => $e->getMessage()]);
        }
        try {
            EfekSampingObat::where('id_obat',$id)->each(function ($efekSampingObat, $key) {
                $efekSampingObat->delete();
            });
            
            $efekSampingObatArray = $request->input('id_efek_samping_obat');
            $countEfekSampingObat = sizeof($efekSampingObatArray);
            $itemsEfekSampingObat = array();
            for($i = 0; $i < $countEfekSampingObat; $i++){
                $item = array(
                    'id_efek_samping' => $efekSampingObatArray[$i],
                    'id_obat' =>$id,
                );
                $itemsEfekSampingObat[] = $item;
            }
            EfekSampingObat::insert($itemsEfekSampingObat);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Update Failed', 'message' => $e->getMessage()]);
        }
        DB::commit();

        return response()->json([
            'status' => 'Success',
            'message' => 'update obat success'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ObatResep = ObatResep::firstWhere('id',$id);
        if(!$ObatResep){
            Obat::find($id)->delete();
            return response()->json([
                "message" => "data dihapus",
            ]);
        }else {
            return response()->json([
                "message" => 'tidak dihapus',
            ]);
        };
    }
}
