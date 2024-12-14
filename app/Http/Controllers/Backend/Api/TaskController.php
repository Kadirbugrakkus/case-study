<?php

namespace App\Http\Controllers\Backend\Api;

use App\Factories\AdapterFactory;
use App\Objects\TaskData;
use App\Services\TaskService;
use Exception;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService){
        $this->taskService = $taskService;
    }
    public function getMockOne()
    {
        try {
            $response = [];

            for ($i = 1; $i <= 8; $i++) {
                $response[] = [
                    "id" => $i,
                    "name" => "TaskMockOne-".$i,
                    "value" => rand(1, 10),
                    "estimated_duration" => rand(1, 15),
                ];
            }

            return response()->json($response);
        }catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    public function getMockTwo()
    {
        try {
            $response = [];

            for ($i = 1; $i <= 8; $i++) {
                $response[] = [
                    "id" => $i,
                    "baslik" => "TaskMockTwo-" . $i,
                    "zorluk" => rand(1, 5),
                    "sure" => rand(1, 10),
                ];
            }

            return response()->json($response);
        }catch (Exception $e) {
           return response()->json($e->getMessage(), 400);
        }
    }

    public function index()
    {
        try {
            $responseData = $this->getResponse();
            $data = $this->taskService->insertTask($responseData);

            return Response::withData(true, 'Task save success', $data);

        }catch (Exception $e) {
            return Response::withoutData(false, $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    private function getResponse(): array
    {
        $firstApiResponse = app(TaskController::class)->getMockOne();
        //$firstApiResponse = Http::withHeaders(['Accept' => 'application/json'])->get("http://127.0.0.1:8000/api/mock/one");
        $firstApiAdapter = AdapterFactory::getAdapter('first_api');
        $firstTasks = $firstApiAdapter->transform($firstApiResponse->original);

        $secondApiResponse = app(TaskController::class)->getMockTwo();
        //$secondApiResponse = Http::withHeaders(['Accept' => 'application/json'])->get("http://127.0.0.1:8000/api/mock/two");
        $secondApiAdapter = AdapterFactory::getAdapter('second_api');
        $secondTasks = $secondApiAdapter->transform($secondApiResponse->original);


        $mergedTasks = array_merge($firstTasks, $secondTasks);

        return array_map(function ($task) {
            return new TaskData(
                $task['id'],
                $task['name'],
                $task['value'],
                $task['estimated_duration']
            );
        }, $mergedTasks);
    }


    public function assignTask()
    {
        try {
            $data = $this->taskService->assignTasks();

            return Response::withData(true, 'Task assignment success', $data);
        } catch (Exception $e) {
            return Response::withoutData(false, $e->getMessage());
        }
    }
}
