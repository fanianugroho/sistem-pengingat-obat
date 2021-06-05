<?php

namespace App\Http\Controllers;
use App\Pasien;
use App\Obat;
use App\BentukObat;
use App\InteraksiObat;
use App\KontraindikasiObat;
use App\ObatResep;
use App\Resep;
use Illuminate\Support\Facades\DB;
Use Carbon\Carbon;
use Carbon\CarbonPeriod;

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
        // $todayGrafik = Carbon::now()->toDateString();
        // $today7past =\Carbon\Carbon::today()->subDays(7)->toDateString();
        // dd($today7past);
        // $period = CarbonPeriod::create($todayGrafik, $today7past);
        // $thisRange[] = [];
        // foreach ($period as $date) {
        //     dd( $date->format('Y-m-d')); 
        // }

        $start = Carbon::now()->addDays(-7);
        $end = Carbon::now();

        $dates = [];
        for($i = 0; $i <= $end->diffInDays($start); $i++){
            $dates[] = (clone $start)->addDays($i)->format('Y-m-d');
        }
        foreach ($dates as $date) {
            $resep = Resep::whereDay('created_at',Carbon::parse($date)->format('d'))
                ->whereMonth('created_at',Carbon::parse($date)->format('m'))->count();
            $thisRange[] = Carbon::parse($date)->locale('id_ID')->isoFormat('LL');
            $total[] = $resep;
        }
        // dd($thisRange);

        return view('app.beranda',compact('pasienbaru','resepbaru','jumlahobat','jumlahpasien','obatResep','today','thisRange','total'));
    }
    
    public function tampilanawal ()
    {   
        return view('app.welcome');
    }
}
