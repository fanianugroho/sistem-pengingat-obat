<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resep extends Model
{
    use SoftDeletes;

    protected $table ='resep';
    protected $primaryKey = 'id';
    protected $fillable=[
        'id_pasien',
        'id_users',
    ];

    public function pasien(){
        return $this->belongsTo('App\Pasien', 'id_pasien');
    }
    public function users(){
        return $this->belongsTo('App\User', 'id_users');
    }
    public function obatResep(){
        return $this->hasMany('App\ObatResep', 'id_obat');
    }
}
