<?php

namespace App\Http\Controllers;
use App\Interaksi;
use Illuminate\Http\Request;

class InteraksiObatController extends Controller
{
    
    public function all()
    {
        $data = Interaksi::all();
        return $data; 
    }

    public function index()
    {
        return view('interaksi_obat.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_interaksi' => 'required',
        ]);

        Interaksi::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_interaksi' => 'required',
        ]);

        return Interaksi::find($id)->update($request->all());
    }
    
    public function destroy($id)
    {
        return Interaksi::find($id)->delete();
    }
}
