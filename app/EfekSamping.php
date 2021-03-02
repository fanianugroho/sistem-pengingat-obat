<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EfekSamping extends Model
{

    protected $table = 'efek_samping';
    protected $primaryKey = 'id';
    protected $fillable=['nama_efek_samping'];
}
