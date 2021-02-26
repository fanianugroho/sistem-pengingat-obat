<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pasien extends Model
{

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

}
