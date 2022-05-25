<?php
use App\Http\Controllers\AddressController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\NotWorkDayController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WorkDayController;
use Illuminate\Http\Request;
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


Route::resource('address', AddressController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('job', JobController::class);
Route::resource('job-type', JobTypeController::class);
Route::resource('not-work-day', NotWorkDayTypeController::class);
Route::resource('review', ReviewController::class);
Route::resource('work-day', WorkDayTypeController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});