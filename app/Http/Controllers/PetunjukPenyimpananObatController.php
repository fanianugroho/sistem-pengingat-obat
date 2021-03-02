<?php

namespace App\Http\Controllers;
use App\PetunjukPenyimpananObat;
use Illuminate\Http\Request;

class PetunjukPenyimpananObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data = PetunjukPenyimpananObat::all();
        return $data; 
    }
    public function index()
    {
        return view('petunjuk_penyimpanan_obat.index');
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
            'nama_petunjuk_penyimpanan' => 'required',
        ]);

        PetunjukPenyimpananObat::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_petunjuk_penyimpanan' => 'required',
        ]);
        
        return PetunjukPenyimpananObat::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return PetunjukPenyimpananObat::find($id)->delete();
    }
}
