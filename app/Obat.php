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
        'kesediaan',
        'satuan',
        'id_kontraindikasi_obat',
        'id_interaksi_obat',
        'efek_samping',
        'petunjuk penyimpanan',
        'pola_makan',
        'informasi',
        'harga_pokok',
        'harga_jual',
        'stok',
        'min_stok',
        'id_users',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_users');
    }
    public function bentuk_obat(){
        return $this->belongsTo('App\Models\BentukObat', 'id_bentuk_obat');
    }
    public function kontraindikasi_obat(){
        return $this->belongsTo('App\Models\KontraindikasiObat', 'id_kontraindikasi_obat');
    }
    public function interaksi_obat(){
        return $this->belongsTo('App\Models\InteraksiObat', 'id_interaksi_obat');
    }
}
