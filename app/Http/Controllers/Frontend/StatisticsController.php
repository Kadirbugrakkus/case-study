<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use Illuminate\Http\Request;

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
}
