<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EfekSampingObat extends Model
{
    protected $table ='efek_samping_obat';

    protected $fillable=[
        'id_efek_samping',
        'id_obat',
    ];

    public function efek_samping(){
        return $this->belongsTo('App\EfekSamping', 'id_efek_samping');
    }
    public function obat(){
        return $this->belongsTo('App\Obat', 'id_obat');
    }
}
