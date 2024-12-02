<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Users extends Authenticatable
{
    use Notifiable,
        HasFactory,
        HasApiTokens;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'picture'
    ];

    public function target(): HasMany
    {
        return $this->HasMany(Target::class, 'user id', 'id');
    }
    public function transaction(): HasMany
    {
        return $this->HasMany(Transaction::class, 'user id', 'id');
    }
}
