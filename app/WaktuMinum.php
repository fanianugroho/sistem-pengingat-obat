<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaktuMinum extends Model
{
    protected $table ='waktu_minum';

    protected $fillable=[
        'id_minum_obat',
        'jam_minum',
        'waktu',
    ];

    public function minum_obat(){
        return $this->belongsTo('App\MinumObat', 'id_minum_obat');
    }
}
