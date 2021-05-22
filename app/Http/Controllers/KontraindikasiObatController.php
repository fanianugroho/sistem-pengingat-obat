<?php

namespace App\Http\Controllers;
use App\Kontraindikasi;
use Illuminate\Http\Request;

class KontraindikasiObatController extends Controller
{
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kontraindikasi' => 'required',
        ]);

        return Kontraindikasi::find($id)->update($request->all());
    }

    public function destroy($id)
    {
        return Kontraindikasi::find($id)->delete();
    }
}
