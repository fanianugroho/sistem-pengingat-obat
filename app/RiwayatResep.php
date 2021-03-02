<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiwayatResep extends Model
{
    use SoftDeletes;

    protected $table ='riwayat_resep';
    protected $primaryKey = 'id';
    protected $fillable=[
        'id_resep',
    ];

    public function resep(){
        return $this->belongsTo('App\Resep', 'id_resep');
    }
}
