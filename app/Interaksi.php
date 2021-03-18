<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interaksi extends Model
{
 
    protected $table = 'interaksi';
    protected $primaryKey = 'id';
    protected $fillable=['nama_interaksi'];

}
