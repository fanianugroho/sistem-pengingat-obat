<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontraindikasiObat extends Model
{
    protected $table ='kontraindikasi_obat';
    protected $primaryKey = 'id';
    protected $fillable=[
        'id_kontraindikasi',
        'id_obat',
    ];

    public function kontraindikasi(){
        return $this->belongsTo('App\Kontraindikasi', 'id_kontraindikasi');
    }
    public function obat(){
        return $this->belongsTo('App\Obat', 'id_obat');
    }
}
