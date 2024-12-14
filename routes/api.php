<?php

use App\Http\Controllers\Backend\Api\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('get/task', [TaskController::class, 'index']);
Route::get('assign/task', [TaskController::class, 'assignTask']);

Route::get('mock/one', [TaskController::class, 'getMockOne']);
Route::get('mock/two', [TaskController::class, 'getMockTwo']);

