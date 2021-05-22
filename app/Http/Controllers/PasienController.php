<?php

namespace App\Http\Controllers;
use App\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data = Pasien::all();
        return $data; 
    }
    
    public function index()
    {
        return view('pasien.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_rm' => 'required',
            'nama_pasien' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        Pasien::create($request->all());
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_rm' => 'required',
            'nama_pasien' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        return Pasien::find($id)->update($request->all());
    }

    public function destroy($id)
    {
        return Pasien::find($id)->delete();
    }
}
