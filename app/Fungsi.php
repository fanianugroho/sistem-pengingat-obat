<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fungsi extends Model
{

    protected $table = 'fungsi';
    protected $primaryKey = 'id';
    protected $fillable=['nama_fungsi'];
}
