<?php
use App\Http\Controllers\AddressController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\NotWorkDayController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WorkDayController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 
Route::controller(JobController::class)->group(function () {
    Route::get('/job', 'indexView');
    Route::post('/orders', 'store');
});

Route::get('/', function () {
    return view('welcome');
});
