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

        EfekSamping::create($request->all());
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_efek_samping' => 'required',
        ]);

        return EfekSamping::find($id)->update($request->all());
    }

    
    public function destroy($id)
    {
        return EfekSamping::find($id)->delete();
    }
}
