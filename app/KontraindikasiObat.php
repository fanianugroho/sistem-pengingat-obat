<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KontraindikasiObat extends Model
{
    use SoftDeletes;

    protected $table = 'kontraindikasi_obat';
    protected $fillable=['nama_kontraindikasi'];
}
