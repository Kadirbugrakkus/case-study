<?php

namespace App\Console\Commands;

use App\Http\Controllers\Backend\Api\TaskController;
use Exception;
use Illuminate\Console\Command;

class AssignTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:assignment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task assignment';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->info('Task assignment...');

        try {
            $controller = app(TaskController::class);
            $controller->assignTask();

            $this->info('Task assignment completed!');
        } catch (Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }

        return 0;
    }
}
