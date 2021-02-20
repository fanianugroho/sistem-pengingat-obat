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
<<<<<<< HEAD
=======

>>>>>>> 865e75b9880c049445bc2286c97ecf3f80022e39
}
