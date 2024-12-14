<?php

namespace App\Services;

use App\Interfaces\ITask;
use App\Objects\AssignTaskData;
use App\Objects\TaskData;
use Exception;

class TaskService
{
    protected ITask $taskRepository;

    public function __construct(ITask $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function insertTask($responseData)
    {
        return $this->taskRepository->insertTask($responseData);
    }

    /**
     * * @throws Exception
     * */
    public function store(array $assignments)
    {
        $assignTaskDataObjects = array_map(

        function ($assignment) {
            if (!isset($assignment['developer_id'], $assignment['task_id'], $assignment['assigned_hours'])) {
                throw new Exception('Invalid assignment data.');
            }

            return new AssignTaskData(
                $assignment['developer_id'],
                $assignment['task_id'],
                $assignment['assigned_hours']
            );
        }, $assignments);

        return $this->taskRepository->assignTasks($assignTaskDataObjects);
    }

    /**
     * Görevleri developerlar arasında paylaştırır.
     *
     * @return array
     * @throws Exception
     */
    public function assignTasks(): array
    {
        $tasks = $this->taskRepository->getUnassignedTasks();
        $developers = collect($this->taskRepository->getAllDevelopers());

        usort($tasks, function (TaskData $a, TaskData $b) {
            return ($b->value * $b->estimated_duration) - ($a->value * $a->estimated_duration);
        });

        $assignments = [];

        foreach ($tasks as $task) {
            $developer = $developers->sortBy('weekly_hours')->first();

            $task_duration = $task->estimated_duration / $developer['efficiency'];

            if ($developer['weekly_hours'] + $task_duration <= 45) {
                $developers = $developers->map(function ($dev) use ($developer, $task_duration) {
                    if ($dev['id'] === $developer['id']) {
                        $dev['weekly_hours'] += $task_duration;
                    }
                    return $dev;
                });

                $assignments[] = [
                    'developer_id' => $developer['id'],
                    'task_id' => $task->id,
                    'assigned_hours' => $task_duration,
                ];
            } else {
                $assignments[] = [
                    'developer_id' => null,
                    'task_id' => $task->id,
                    'assigned_hours' => 0,
                ];
            }
        }
        return $this->store($assignments);
    }
}
