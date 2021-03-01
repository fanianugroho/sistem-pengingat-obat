<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EfekSampingObat extends Model
{

    protected $table = 'efek_samping_obat';
    protected $fillable=['nama_efek_samping'];
}
