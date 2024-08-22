<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'is_done'];

    protected $hidden = ['created_at', 'updated_at', 'is_done'];

    protected $casts = [
        'is_done' => 'boolean',
    ];

    public function getIsDoneAttribute()
    {
        return (bool) $this->attributes['is_done'];
    }

    protected $appends = ['isDone'];

    public function toArray()
    {
        $array = parent::toArray();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'isDone' => $this->isDone,
        ];
    }
}
