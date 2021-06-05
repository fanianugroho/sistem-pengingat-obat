<?php

namespace App\Http\Controllers;
use App\Fungsi;
use Illuminate\Http\Request;

class FungsiObatController extends Controller
{
    
    public function all()
    {
        $data = Fungsi::all();
        return $data; 
    }
    public function index()
    {
        return view('fungsi_obat.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fungsi' => 'required',
        ]);

        Fungsi::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_fungsi' => 'required',
        ]);

        return Fungsi::find($id)->update($request->all());
    }

    public function destroy($id)
    {
        return Fungsi::find($id)->delete();
    }
}
