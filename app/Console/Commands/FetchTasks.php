<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use App\Http\Controllers\Backend\Api\TaskController;

class FetchTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch tasks from APIs and save them into the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->info('Fetching tasks from APIs...');

        try {
            $controller = app(TaskController::class);
            $controller->index();

            $this->info('Tasks fetched and saved successfully!');
        } catch (Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }

        return 0;
    }
}
