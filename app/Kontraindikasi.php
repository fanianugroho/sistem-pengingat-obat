<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontraindikasi extends Model
{
    protected $table = 'kontraindikasi';
    protected $primaryKey = 'id';
    protected $fillable=['nama_kontraindikasi'];
}
