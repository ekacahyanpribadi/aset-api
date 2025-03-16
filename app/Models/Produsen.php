<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produsen extends Model
{
    public $keyType = 'string';
    protected $primaryKey = 'produsen_id';
    public $timestamps = false;
}
