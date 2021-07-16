<?php

namespace App\Http\Controllers;
use App\Resep;
use App\Pasien;
use App\Obat;
use App\ObatResep;
use App\BentukObat;
use App\MinumObat;
use App\WaktuMinum;
use App\WaktuMakan;
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
        $request->validate([
            'id_obat' => 'required',
            'dosis' => 'required',
            'aturan_pakai' => 'required',
            'waktu_minum' => 'required',
            'keterangan' => 'required',
            'jml_obat' => 'required',
        ]);
       
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
        }try {
            $minumObat = New MinumObat;
            $minumObat->id_obat_resep = $obatResep->id;
            $minumObat->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        if($obatResep->aturan_pakai =='3'){
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'pagi';
                $waktuMinum->waktu = '07:00:00';
                $waktuMinum->keterangan = 'minum obat pagi';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'siang';
                $waktuMinum->waktu = '15:00:00';
                $waktuMinum->keterangan = 'minum obat siang';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'malam';
                $waktuMinum->waktu = '23:00:00';
                $waktuMinum->keterangan = 'minum obat malam';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'pagi';
                $waktuMakan->waktu = '06:30:00';
                $waktuMakan->keterangan = 'makan pagi';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'siang';
                $waktuMakan->waktu = '14:30:00';
                $waktuMakan->keterangan = 'makan siang';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'malam';
                $waktuMakan->waktu = '22:30:00';
                $waktuMakan->keterangan = 'makan malam';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
        } else if ($obatResep->aturan_pakai =='2'){
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'pagi';
                $waktuMinum->waktu = '07:00:00';
                $waktuMinum->keterangan = 'minum obat pagi';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'malam';
                $waktuMinum->waktu = '19:00:00';
                $waktuMinum->keterangan = 'minum obat malam';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'pagi';
                $waktuMakan->waktu = '06:30:00';
                $waktuMakan->keterangan = 'makan pagi';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'malam';
                $waktuMakan->waktu = '18:30:00';
                $waktuMakan->keterangan = 'makan malam';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
        } else{
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'pagi';
                $waktuMinum->waktu = '07:00:00';
                $waktuMinum->keterangan = 'minum obat pagi';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'siang';
                $waktuMinum->waktu = '13:00:00';
                $waktuMinum->keterangan = 'minum obat siang';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'malam';
                $waktuMinum->waktu = '18:00:00';
                $waktuMinum->keterangan = 'minum obat malam';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'malam2';
                $waktuMinum->waktu = '23:00:00';
                $waktuMinum->keterangan = 'minum obat malam';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'pagi';
                $waktuMakan->waktu = '06:30:00';
                $waktuMakan->keterangan = 'makan pagi';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'siang';
                $waktuMakan->waktu = '12:30:00';
                $waktuMakan->keterangan = 'makan siang';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'malam';
                $waktuMakan->waktu = '17:30:00';
                $waktuMakan->keterangan = 'makan malam';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'malam2';
                $waktuMakan->waktu = '22:30:00';
                $waktuMakan->keterangan = 'makan malam';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
        }
        DB::commit();
        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil membuat obat resep'
        ]); 
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'id_obat' => 'required',
            'dosis' => 'required',
            'aturan_pakai' => 'required',
            'waktu_minum' => 'required',
            'keterangan' => 'required',
            'jml_obat' => 'required',
        ]);
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
        try {
            $minumObat = New MinumObat;
            $minumObat->id_obat_resep = $obatResep->id;
            $minumObat->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
        }
        if($obatResep->aturan_pakai =='3'){
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'pagi';
                $waktuMinum->waktu = '07:00:00';
                $waktuMinum->keterangan = 'minum obat pagi';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'siang';
                $waktuMinum->waktu = '15:00:00';
                $waktuMinum->keterangan = 'minum obat siang';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'malam';
                $waktuMinum->waktu = '23:00:00';
                $waktuMinum->keterangan = 'minum obat malam';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'pagi';
                $waktuMakan->waktu = '06:30:00';
                $waktuMakan->keterangan = 'makan pagi';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'siang';
                $waktuMakan->waktu = '14:30:00';
                $waktuMakan->keterangan = 'makan siang';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'malam';
                $waktuMakan->waktu = '22:30:00';
                $waktuMakan->keterangan = 'makan malam';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
        } else if ($obatResep->aturan_pakai =='2'){
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'pagi';
                $waktuMinum->waktu = '07:00:00';
                $waktuMinum->keterangan = 'minum obat pagi';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'malam';
                $waktuMinum->waktu = '19:00:00';
                $waktuMinum->keterangan = 'minum obat malam';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'pagi';
                $waktuMakan->waktu = '06:30:00';
                $waktuMakan->keterangan = 'makan pagi';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'malam';
                $waktuMakan->waktu = '18:30:00';
                $waktuMakan->keterangan = 'makan malam';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
        } else{
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'pagi';
                $waktuMinum->waktu = '07:00:00';
                $waktuMinum->keterangan = 'minum obat pagi';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'siang';
                $waktuMinum->waktu = '13:00:00';
                $waktuMinum->keterangan = 'minum obat siang';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'malam';
                $waktuMinum->waktu = '18:00:00';
                $waktuMinum->keterangan = 'minum obat malam';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMinum = New WaktuMinum;
                $waktuMinum->id_minum_obat = $minumObat->id;
                $waktuMinum->jam_minum = 'malam2';
                $waktuMinum->waktu = '23:00:00';
                $waktuMinum->keterangan = 'minum obat malam';
                $waktuMinum->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'pagi';
                $waktuMakan->waktu = '06:30:00';
                $waktuMakan->keterangan = 'makan pagi';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'siang';
                $waktuMakan->waktu = '12:30:00';
                $waktuMakan->keterangan = 'makan siang';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'malam';
                $waktuMakan->waktu = '17:30:00';
                $waktuMakan->keterangan = 'makan malam';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
            try {
                $waktuMakan = New WaktuMakan;
                $waktuMakan->id_minum_obat = $minumObat->id;
                $waktuMakan->jam_makan = 'malam2';
                $waktuMakan->waktu = '22:30:00';
                $waktuMakan->keterangan = 'makan malam';
                $waktuMakan->save();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'Failed', 'message' => $e->getMessage()],404);
            }
        }
        DB::commit();
        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil membuat resep'
        ]); 
    }

    public function update(Request $request, $id){
        $request->validate([
            'id_obat' => 'required',
            'dosis' => 'required',
            'aturan_pakai' => 'required',
            'waktu_minum' => 'required',
            'keterangan' => 'required',
            'jml_obat' => 'required',
        ]);

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
            'message' => 'Berhasil mengubah obat resep'
        ]); 
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

    public function cetakPdf($array)
    {
        $fungsiArray = explode (",", $array); 
        $countFungsi = sizeof($fungsiArray);
        $resep = array();
        $qr = array();
        for($i = 0; $i < $countFungsi; $i++){
            $item = ObatResep::with('obat','resep.pasien')->where('id',$fungsiArray[$i])->first();
            $resep[] = $item;
        }
    	$pdf = PDF::loadview('resep.resep_pdf',compact('resep'))->setPaper('b7', 'landscape');
        return $pdf->stream();
    }
}
