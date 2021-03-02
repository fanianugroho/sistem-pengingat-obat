<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObatResep extends Model
{
    use SoftDeletes;

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
