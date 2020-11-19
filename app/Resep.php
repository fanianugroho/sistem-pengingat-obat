<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resep extends Model
{
    use SoftDeletes;

    protected $table ='resep';

    protected $fillable=[
        'no_resep',
        'tanggal_resep',
        'id_pasien',
        'id_obat',
        'dosis',
        'aturan_pakai',
        'takaran_minum',
        'waktu_minum',
        'keterangan',
        'jml_obat',
        'jml_kali_minum',

    ];

    public function obat(){
        return $this->belongsTo('App\Obat', 'id_obat');
    }
    public function pasien(){
        return $this->belongsTo('App\Pasien', 'id_pasien');
    }

}
