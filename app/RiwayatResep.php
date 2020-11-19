<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiwayatResep extends Model
{
    use SoftDeletes;

    protected $table ='riwayat_resep';

    protected $fillable=[
        'id_pasien',
        'id_obat',
    ];

    public function obat(){
        return $this->belongsTo('App\Obat', 'id_obat');
    }
    public function pasien(){
        return $this->belongsTo('App\Pasien', 'id_pasien');
    }
}
