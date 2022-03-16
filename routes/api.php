<?php
use App\Http\Controllers\TicketController;
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
//Route::middleware(['auth','isAdmin'])->group(function() {
    Route::get('{id}/show', [TicketController::class,'show']);
    Route::get('Tickets', [TicketController::class,'index']);
    Route::delete('{id}/delete', [TicketController::class,'destroy']);
    Route::put('{id}/update', [TicketController::class,'update']);
    Route::post('/create',[TicketController::class,'store']);
//});
//Auth::routes();

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});
