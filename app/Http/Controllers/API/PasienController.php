<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pasien;


class PasienController extends Controller
{
    public function index()
    {
        $data = Pasien::all();
        return response()->json($data);
    }
}
