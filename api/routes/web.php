<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AddressController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\EmployeeController;
use App\Http\Controllers\Web\JobTypeController;
use App\Http\Controllers\Web\JobController;
use App\Http\Controllers\Web\WorkDayController;
use App\Http\Controllers\Web\WorkPlaceController;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::resource('address', AddressController::class);
    Route::resource('user', UserController::class)->except([
        'store','delete'
    ]);
    Route::resource('employee', EmployeeController::class)->except([
        'update','delete'
    ]);
    Route::resource('job_type', JobTypeController::class);
    
    Route::resource('work_day', WorkDayController::class)->except([
         'update', 'delete', 'create', 'show'
    ]);
    Route::resource('work_place', WorkPlaceController::class)->except([
        'update', 'delete', 'show'
   ]);
    
    Route::resource('job', JobController::class)->except([
        'show','update', 'delete', 'create', 'show'
   ]);
   Route::put('/job/accept', [JobController::class, 'acceptJob'])->name('job.accept');
   


});


require __DIR__.'/auth.php';
