<?php

namespace App\Http\Controllers;
use App\EfekSamping;
use Illuminate\Http\Request;

class EfekSampingObatController extends Controller
{
    
    public function all()
    {
        $data = EfekSamping::all();
        return $data; 
    }

    public function index()
    {
        return view('efek_samping_obat.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_efek_samping' => 'required',
        ]);

        EfekSampingObat::create($request->all());
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_efek_samping' => 'required',
        ]);

        return EfekSampingObat::find($id)->update($request->all());
    }

    
    public function destroy($id)
    {
        return EfekSampingObat::find($id)->delete();
    }
}
