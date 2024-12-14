<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name','value', 'estimated_duration', 'is_assigned'];


    /**
     * Görevi tamamlayacak developer'lar.
     */
    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'assignments')
            ->withPivot('assigned_hours')
            ->withTimestamps();
    }
}
