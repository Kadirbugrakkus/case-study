<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = ['task_id', 'developer_id', 'assigned_hours'];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
