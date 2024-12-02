<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Target extends Model
{
    protected $table = 'target';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    public function userTarget(): BelongsTo
    {
        return $this->belongsTo(Users::class, "user id", "id");
    }
}
