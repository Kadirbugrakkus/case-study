<?php

namespace App\Objects;

class TaskData
{
    public int $id;
    public string $name;
    public int $value;
    public int $estimated_duration;

    public function __construct(int $id, string $name, int $value, int $estimated_duration)
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->estimated_duration = $estimated_duration;
    }
}
