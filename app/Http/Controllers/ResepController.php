<?php

namespace App\Http\Controllers;
use App\Resep;
use App\Pasien;
use App\Obat;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data =Resep::with('obat')->get();
//          return response()->json($data);
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
        $request->validate([

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
       
       
        Resep::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $request->validate([

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
}
