<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'is_done'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $casts = [
        'is_done' => 'boolean',
    ];
}
