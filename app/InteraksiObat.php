<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteraksiObat extends Model
{
    protected $table ='interaksi_obat';
    protected $primaryKey = 'id';
    protected $fillable=[
        'id_interaksi',
        'id_obat',
    ];

    public function interaksi(){
        return $this->belongsTo('App\Interaksi', 'id_interaksi');
    }
    public function obat(){
        return $this->belongsTo('App\Obat', 'id_obat');
    }
}
