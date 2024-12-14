<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Developer extends Model
{

    protected $fillable = [
        'name',
        'efficiency',
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'assignments')
            ->withPivot('assigned_hours')
            ->withTimestamps();
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class, 'developer_id', 'id');
    }
}
