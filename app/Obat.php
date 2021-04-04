<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obat extends Model
{
    use SoftDeletes;

    protected $table ='obat';

    protected $fillable=[
        'nama_obat',
        'id_bentuk_obat',
        'kekuatan_sediaan',
        'satuan',
        'id_petunjuk_penyimpanan_obat',
        'pola_makan',
        'informasi',
        'id_users',
        
    ];

    public function user(){
        return $this->belongsTo('App\User', 'id_users');
    }
    public function bentuk_obat(){
        return $this->belongsTo('App\BentukObat', 'id_bentuk_obat');
    }
    public function kontraindikasi_obat(){
        return $this->hasMany('App\KontraindikasiObat', 'id_obat');
    }
    public function interaksi_obat(){
        return $this->hasMany('App\InteraksiObat', 'id_obat');
    }
    public function fungsi_obat(){
        return $this->hasMany('App\FungsiObat', 'id_obat');
    }
    public function efek_samping_obat(){
        return $this->hasMany('App\EfekSampingObat', 'id_obat');
    }
}
