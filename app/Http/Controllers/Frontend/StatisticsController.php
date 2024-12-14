<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Developer;

class StatisticsController extends Controller
{
    public function showDeveloperStats()
    {
        $developers = Developer::with('assignments')
            ->get()
            ->map(function ($developer) {
                $totalAssignedHours = $developer->assignments->sum('assigned_hours');
                $realHours = $totalAssignedHours * $developer->efficiency;
                $weeksToFinish = ceil($realHours / 45);

                return [
                    'developer_id' => $developer->id,
                    'developer_name' => $developer->name,
                    'total_hours' => $totalAssignedHours,
                    'real_hours' => $realHours,
                    'weeks_to_finish' => $weeksToFinish,
                ];
            });

        return view('developer-stats', compact('developers'));
    }


    public function showDeveloperDetails($developerId)
    {
        $developer = Developer::with('assignments.task')->findOrFail($developerId);

        $assignments = $developer->assignments->map(function ($assignment) {
            return [
                'task_id' => $assignment->task->id,
                'task_name' => $assignment->task->name,
                'assigned_hours' => $assignment->assigned_hours,
                'task_value' => $assignment->task->value,
                'estimated_duration' => $assignment->task->estimated_duration,
            ];
        });

        return view('developer-details', compact('developer', 'assignments'));
    }
}
