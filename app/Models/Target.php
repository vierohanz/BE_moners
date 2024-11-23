<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $table = 'target';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;
}
