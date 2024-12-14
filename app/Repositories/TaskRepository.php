<?php

namespace App\Repositories;

use App\Interfaces\ITask;
use App\Models\Assignment;
use App\Models\Developer;
use App\Models\Task;
use App\Objects\TaskData;

class TaskRepository implements ITask
{
    public function insertTask(array $responseData)
    {
        $tasks = [];

        foreach ($responseData as $taskData) {
            $tasks[] = [
                'name' => $taskData->name,
                'value' => $taskData->value,
                'estimated_duration' => $taskData->estimated_duration,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Task::insert($tasks);
        return $tasks;
    }

    public function assignTasks($assignTaskDataObjects): array
    {
        $assignedTask = [];
        $taskIds = [];

        foreach ($assignTaskDataObjects as $assignTaskData) {
            $assignedTask[] = [
                'developer_id' => $assignTaskData->developer_id,
                'task_id' => $assignTaskData->task_id,
                'assigned_hours' => $assignTaskData->assigned_hours,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if ($assignTaskData->task_id) {
                $taskIds[] = $assignTaskData->task_id;
            }
        }

        Assignment::insert($assignedTask);

        Task::whereIn('id', $taskIds)->update(['is_assigned' => true]);

        return $assignedTask;
    }

    public function getUnassignedTasks(): array
    {
        return Task::where('is_assigned', false)
            ->get()
            ->map(function ($task) {
                return new TaskData($task->id, $task->name, $task->value, $task->estimated_duration);
            })
            ->toArray();
    }

    public function getAllDevelopers(): array
    {
        return Developer::all()->map(function ($developer) {
            return [
                'id' => $developer->id,
                'name' => $developer->name,
                'efficiency' => $developer->efficiency,
                'weekly_hours' => 0,
            ];
        })->toArray();
    }


}
