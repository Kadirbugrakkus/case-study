<?php

namespace App\Objects;

use PhpParser\Node\Expr\Cast\Double;

class AssignTaskData
{
    public int $developer_id;
    public int $task_id;
    public float $assigned_hours;

    public function __construct(int $developer_id, int $task_id, float $assigned_hours)
    {
        $this->developer_id = $developer_id;
        $this->task_id = $task_id;
        $this->assigned_hours = $assigned_hours;
    }

}
