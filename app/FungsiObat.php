<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FungsiObat extends Model
{

    protected $table = 'fungsi_obat';
    protected $fillable=['nama_fungsi'];
}
