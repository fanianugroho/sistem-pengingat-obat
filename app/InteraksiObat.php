<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InteraksiObat extends Model
{
    use SoftDeletes;

    protected $table = 'interaksi_obat';
    protected $fillable=['nama_interaksi'];

}
