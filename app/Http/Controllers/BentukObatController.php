<?php

namespace App\Http\Controllers;
use App\BentukObat;
use Illuminate\Http\Request;

class BentukObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data = BentukObat::all();
        return $data;
    }
    public function index()
    {
        return view('bentuk_obat.index');
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
            'nama_bentuk' => 'required',
        ]);

        BentukObat::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bentuk' => 'required',
        ]);

        return BentukObat::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return BentukObat::find($id)->delete();

    }
}
