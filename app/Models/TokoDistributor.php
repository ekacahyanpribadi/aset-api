<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokoDistributor extends Model
{
    public $keyType = 'string';
    protected $primaryKey = 'todis_id';
    public $timestamps = false;
}
