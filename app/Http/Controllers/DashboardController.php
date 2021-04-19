<?php

namespace App\Http\Controllers;
use App\Pasien;
use App\Obat;
use App\BentukObat;
use App\InteraksiObat;
use App\KontraindikasiObat;
use App\ObatResep;
use Illuminate\Support\Facades\DB;
Use Carbon\Carbon;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $resepbaru=DB::table('resep')->whereDate('created_at',DB::raw('CURDATE()'))->count();
        $pasienbaru=DB::table('pasien')->whereDate('created_at',DB::raw('CURDATE()'))->count();
        $jumlahobat=Obat::count();
        $jumlahpasien=Pasien::count();
        $today=Carbon::now();
        $obatResep =  DB::table('obat_resep')
                    ->select('id_obat','obat.nama_obat', DB::raw('count(*) as total_obat'))
                    ->join('obat', 'obat.id', '=', 'obat_resep.id_obat')
                    ->groupBy('obat_resep.id_obat','obat.nama_obat')
                    ->orderBy('total_obat', 'desc')
                    ->limit(5)
                    ->get();

        // dd($obatResep);

        return view('app.dashboard',compact('pasienbaru','resepbaru','jumlahobat','jumlahpasien','obatResep','today'));
    }
    
    public function tampilanawal ()
    {
        
        return view('app.welcome');
    }
}
