<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaktuMakan extends Model
{
    protected $table ='waktu_makan';

    protected $fillable=[
        'id_minum_obat',
        'jam_makan',
        'waktu',
        'keterangan',
    ];

    public function minum_obat(){
        return $this->belongsTo('App\MinumObat', 'id_minum_obat');
    }
}
