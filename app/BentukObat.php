<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BentukObat extends Model
{
    use SoftDeletes;

    protected $table = 'bentuk_obat';
    protected $fillable=['nama_bentuk'];
}
