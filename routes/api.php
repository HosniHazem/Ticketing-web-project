<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ImpactController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CategoryController;

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
//Route::middleware(['auth','isAdmin'])->group(function() {
    Route::get('{id}/show', [TicketController::class,'show']);
    Route::get('Tickets', [TicketController::class,'index']);
    Route::delete('{id}/delete', [TicketController::class,'destroy']);
    Route::put('{id}/update', [TicketController::class,'update']);
    Route::post('/create',[TicketController::class,'store']);
//});
///Category:
Route::get('Category/{id}/show', [CategoryController::class,'show']);
    Route::get('Category', [CategoryController::class,'index']);
    Route::delete('Category/{id}/delete', [CategoryController::class,'destroy']);
    Route::put('Category/{id}/update', [CategoryController::class,'update']);
    Route::post('Category/create',[CategoryController::class,'store']);
    ///////
///Status:
Route::get('Status/{id}/show', [StatusController::class,'show']);
    Route::get('Status', [StatusController::class,'index']);
    Route::delete('Status/{id}/delete', [StatusController::class,'destroy']);
    Route::put('Status/{id}/update', [StatusController::class,'update']);
    Route::post('Status/create',[StatusController::class,'store']);
    ///////
///Levels:
Route::get('Levels/{id}/show', [LevelsController::class,'show']);
    Route::get('Levels', [LevelsController::class,'index']);
    Route::delete('Levels/{id}/delete', [LevelsController::class,'destroy']);
    Route::put('Levels/{id}/update', [LevelsController::class,'update']);
    Route::post('Levels/create',[LevelsController::class,'store']);
    ///////
///Impact:
Route::get('Impact/{id}/show', [ImpactController::class,'show']);
    Route::get('Impact', [ImpactController::class,'index']);
    Route::delete('Impact/{id}/delete', [ImpactController::class,'destroy']);
    Route::put('Impact/{id}/update', [ImpactController::class,'update']);
    Route::post('Impact/create',[ImpactController::class,'store']);
    ///////




//Auth::routes();
Route::get('/search', [SearchController::class, 'search']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
//////

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
});
// Messages
Route::post('messages', [ChatController::class, 'message']);
