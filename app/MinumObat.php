<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MinumObat extends Model
{
    use SoftDeletes;

    protected $table ='minum_obat';

    protected $fillable=[
        'id_obat_resep',
        'waktu_minum',
    ];

    public function obat_resep(){
        return $this->belongsTo('App\ObatResep', 'id_obat_resep');
    }
    
}
