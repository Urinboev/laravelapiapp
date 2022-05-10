<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Login;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginHistoryController;
use App\Http\Controllers\EmployeesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/users', [UserController::class, 'login']);

Route::get('/logins', [LoginHistoryController::class, 'writeHistory']);

Route::get('/logins/stats', [LoginHistoryController::class, 'getStats']);

Route::get('/employees', [EmployeesController::class, 'index']);

Route::get('/employees/{id}', [EmployeesController::class, 'getEmployee']);

Route::put('/employees/{id}', [EmployeesController::class, 'updateEmployee']);

Route::delete('/employees/{id}', [EmployeesController::class, 'deleteEmployee']);
