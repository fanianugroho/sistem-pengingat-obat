<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinumObat extends Model
{

    protected $table ='minum_obat';

    protected $fillable=[
        'id_obat_resep',
    ];

    public function obat_resep(){
        return $this->belongsTo('App\ObatResep', 'id_obat_resep');
    }

    public function waktu_minum(){
        return $this->hasMany('App\WaktuMinum', 'id');
    }

    public function waktu_makan(){
        return $this->hasMany('App\WaktuMakan', 'id');
    }
    
}
