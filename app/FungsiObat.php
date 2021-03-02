<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FungsiObat extends Model
{
    protected $table ='fungsi_obat';

    protected $fillable=[
        'id_fungsi',
        'id_obat',
    ];

    public function fungsi(){
        return $this->belongsTo('App\Fungsi', 'id_fungsi');
    }
    public function obat(){
        return $this->belongsTo('App\Obat', 'id_obat');
    }
}
