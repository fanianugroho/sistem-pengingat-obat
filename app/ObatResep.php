<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObatResep extends Model
{

    protected $table ='obat_resep';
    protected $primaryKey = 'id';
    protected $fillable=[
        'id_resep',
        'id_obat',
        'dosis',
        'aturan_pakai',
        'takaran_minum',
        'waktu_minum',
        'keterangan',
        'jml_obat',
        'jml_kali_minum',
    ];

    public function resep(){
        return $this->belongsTo('App\Resep', 'id_resep');
    }
    public function obat(){
        return $this->belongsTo('App\Obat', 'id_obat');
    }
    public function minum_obat(){
        return $this->belongsTo('App\MinumObat', 'id_minum_obat');
    }
}
