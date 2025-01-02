<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class registration extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;
    protected $fillable  =  ['username', 'email', 'password', 'remember_token'];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
