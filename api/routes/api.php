<?php
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\JobTypeController;
use App\Http\Controllers\Api\NotWorkDayController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\WorkDayController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WorkPlaceController;
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

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('address', AddressController::class);
    Route::put('/address/setDefault/{id}', [AddressController::class, 'setDefault']);
    Route::get('/address/getEmployeesByDate', [AddressController::class, 'getEmployeesByDate']);
    Route::apiResource('employee', EmployeeController::class);
    Route::get('employee/job-list/{id}', [EmployeeController::class, 'JobTypeList']);
    Route::get('employee/agenda/{id}', [EmployeeController::class, 'Agenda']);
    Route::get('employee/{id}/reviews', [EmployeeController::class, 'Reviews']);
    Route::POST('searchEmployees', [EmployeeController::class, 'searchEmployees']);
    Route::apiResource('job', JobController::class);
    Route::post('job/ByStatus', [JobController::class, 'indexByStatus']);
    Route::post('job/{id}/finish', [JobController::class, 'finishJob']);
    Route::apiResource('job-type', JobTypeController::class);
    Route::get('job-type/additionals/{id}', [JobTypeController::class, 'JobTypeAdditionals']);
    Route::apiResource('not-work-day', NotWorkDayTypeController::class);
    Route::apiResource('review', ReviewController::class);
    Route::apiResource('work-day', WorkDayTypeController::class);
    
    Route::get('user/getDefaultAddress', [UserController::class, 'getDefaultAddress']);
    Route::put('user', [UserController::class, 'update']);

    Route::post('logout', [UserController::class, 'logout']);
    Route::post('addFavorite/{id}', [UserController::class, 'addFavorite']);
    Route::post('removeFavorite/{id}', [UserController::class, 'removeFavorite']);
    Route::get('getIsFavorited/{id}', [UserController::class, 'getIsFavorited']);
    Route::get('favorites', [UserController::class, 'getFavorites']);


});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);


Route::get('work_place/getCities/{id}', [WorkPlaceController::class, 'getCities'])->name('work_place.getCities');

// Route::post('/register', function (Request $request) {
//     return response()->json($request->all(), 200);
// });

