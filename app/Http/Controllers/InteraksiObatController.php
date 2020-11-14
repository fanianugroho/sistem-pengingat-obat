<?php

namespace App\Http\Controllers;
use App\InteraksiObat;
use Illuminate\Http\Request;

class InteraksiObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data = InteraksiObat::all();
        return $data; 
    }

    public function index()
    {
        return view('interaksi_obat.index');
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
            'nama_interaksi' => 'required',
        ]);

        InteraksiObat::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_interaksi' => 'required',
        ]);

        return InteraksiObat::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return InteraksiObat::find($id)->delete();
    }
}
