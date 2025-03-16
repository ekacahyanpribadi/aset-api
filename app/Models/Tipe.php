<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    public $keyType = 'string';
    protected $primaryKey = 'tipe_id';
    public $timestamps = false;
}
