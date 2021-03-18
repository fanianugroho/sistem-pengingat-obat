<?php

namespace App\Http\Controllers;
use App\Kontraindikasi;
use Illuminate\Http\Request;

class KontraindikasiObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data = Kontraindikasi::all();
        return $data; 
    }

    public function index()
    {
        return view('kontraindikasi_obat.index');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama_kontraindikasi' => 'required',
        ]);

        Kontraindikasi::create($request->all());
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
            'nama_kontraindikasi' => 'required',
        ]);

        return Kontraindikasi::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Kontraindikasi::find($id)->delete();
    }
}
