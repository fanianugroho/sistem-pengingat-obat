<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetunjukPenyimpananObat extends Model
{
    

    protected $table = 'petunjuk_penyimpanan_obat';
    protected $fillable=['nama_petunjuk_penyimpanan'];
}
