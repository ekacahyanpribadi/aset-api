<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    public $keyType = 'string';
    protected $primaryKey = 'merk_id';
    public $timestamps = false;
}
