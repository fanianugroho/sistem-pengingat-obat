<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Pasien extends Model
{
    use SoftDeletes;

    protected $table ='pasien';

    protected $primaryKey = 'id';

    protected $fillable=[
        'no_rm',
        'nama_pasien',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_telp',
        'alamat',
    ];

    public function getTanggalLahirAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tanggal_lahir'])->locale('id_ID')->isoFormat('LL');
    }
}
