<?php

namespace App\Interfaces;


interface ITask
{
    public function assignTasks($assignTaskDataObjects);
    public function insertTask(array $responseData);
}
