<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    
    public $keyType = 'string';
    protected $primaryKey = 'lokasi_id';
    public $timestamps = false;
}
