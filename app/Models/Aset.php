<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    public $keyType = 'string';
    protected $primaryKey = 'aset_id';
    public $timestamps = false;
}
