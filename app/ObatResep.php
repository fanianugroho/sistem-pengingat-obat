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
    ];

    public function resep(){
        return $this->belongsTo('App\Resep', 'id_resep');
    }
    public function obat(){
        return $this->belongsTo('App\Obat', 'id_obat');
    }
}
