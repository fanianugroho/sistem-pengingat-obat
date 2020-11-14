<?php

namespace App\Http\Controllers;
use App\BentukObat;
use App\InteraksiObat;
use App\KontraindikasiObat;
use App\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data =Obat::with('bentuk_obat','kontraindikasi_obat','interaksi_obat')->get();
//          return response()->json($data);
	    return $data;
    }
    public function index()
    {
        $bentuk_obat = BentukObat::all();
        $interaksi_obat = InteraksiObat::all();
        $kontraindikasi_obat = KontraindikasiObat::all();
        return view('obat.index',compact('bentuk_obat','interaksi_obat','kontraindikasi_obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $request->validate([

            'nama_obat' => 'required',
            'id_bentuk_obat' => 'required',
            'kesediaan' => 'required',
            'satuan' => 'required',
            'id_kontraindikasi_obat' => 'required',
            'id_interaksi_obat' => 'required',
            'efek_samping' => 'required',
            'petunjuk_penyimpanan' => 'required',
            'pola_makan' => 'required',
            'informasi' => 'required',
            'harga_pokok' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'min_stok' => 'required',
        ]);
       
       
        Obat::create($request->all());
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([

            'nama_obat' => 'required',
            'id_bentuk_obat' => 'required',
            'kesediaan' => 'required',
            'satuan' => 'required',
            'id_kontraindikasi_obat' => 'required',
            'id_interaksi_obat' => 'required',
            'efek_samping' => 'required',
            'petunjuk_penyimpanan' => 'required',
            'pola_makan' => 'required',
            'informasi' => 'required',
            'harga_pokok' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'min_stok' => 'required',
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
