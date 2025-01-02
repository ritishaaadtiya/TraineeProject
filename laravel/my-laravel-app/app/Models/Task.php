<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'user_id',
        'attachment'
    ];

    // Each task belongs to a user
    public function user()
    {
        return $this->belongsTo(registration::class);
    }
}
