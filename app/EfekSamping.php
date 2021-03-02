<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EfekSamping extends Model
{

    protected $table = 'efek_samping';
    protected $fillable=['nama_efek_samping'];
}
