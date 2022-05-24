<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sanctum\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ImpactController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UrgencyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\RequestTypeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TicketModelController;
use App\Http\Controllers\DepartementsController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\CategoryMembersController;
use App\Http\Controllers\TicketCloseModelController;
use App\Http\Controllers\TicketAttachementsController;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\ProfileController;

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
    Route::get('Tickets/{id}/show', [TicketController::class,'show']);
    Route::get('Tickets', [TicketController::class,'index']);
    Route::delete('Tickets/{id}/delete', [TicketController::class,'destroy']);
    Route::put('Tickets/{id}/update', [TicketController::class,'update']);
    Route::post('Tickets/create',[TicketController::class,'store']);
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
    Route::delete('Levels/delete/{id}', [LevelsController::class,'destroy']);
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
///Departements:
Route::get('Departements/{id}/show', [DepartementsController::class,'show']);
    Route::get('Departements', [DepartementsController::class,'index']);
    Route::delete('Departements/{id}/delete', [DepartementsController::class,'destroy']);
    Route::put('Departements/{id}/update', [DepartementsController::class,'update']);
    Route::post('Departements/create',[DepartementsController::class,'store']);
    ///////
///Urgency:
Route::get('Urgency/{id}/show', [UrgencyController::class,'show']);
    Route::get('Urgency', [UrgencyController::class,'index']);
    Route::delete('Urgency/{id}/delete', [UrgencyController::class,'destroy']);
    Route::put('Urgency/{id}/update', [UrgencyController::class,'update']);
    Route::post('Urgency/create',[UrgencyController::class,'store']);
    ///////
///Priority:
Route::get('Priority/{id}/show', [PriorityController::class,'show']);
Route::get('Priority', [PriorityController::class,'index']);
Route::delete('Priority/{id}/delete', [PriorityController::class,'destroy']);
Route::put('Priority/{id}/update', [PriorityController::class,'update']);
Route::post('Priority/create',[PriorityController::class,'store']);
///////
///RequestType:
Route::get('RequestType/{id}/show', [RequestTypeController::class,'show']);
Route::get('RequestType', [RequestTypeController::class,'index']);
Route::delete('RequestType/{id}/delete', [RequestTypeController::class,'destroy']);
Route::put('RequestType/{id}/update', [RequestTypeController::class,'update']);
Route::post('RequestType/create',[RequestTypeController::class,'store']);
///////
///Category:
Route::get('Category/{id}/show', [CategoryController::class,'show']);
Route::get('Category', [CategoryController::class,'index']);
Route::delete('Category/{id}/delete', [CategoryController::class,'destroy']);
Route::put('Category/{id}/update', [CategoryController::class,'update']);
Route::post('Category/create',[CategoryController::class,'store']);
///////
///TicketModel:
Route::get('TicketModel/{id}/show', [TicketModelController::class,'show']);
Route::get('TicketModel', [TicketModelController::class,'index']);
Route::delete('TicketModel/{id}/delete', [TicketModelController::class,'destroy']);
Route::put('TicketModel/{id}/update', [TicketModelController::class,'update']);
Route::post('TicketModel/create',[TicketModelController::class,'store']);
///////
///Locations:
Route::get('Locations/{id}/show', [LocationsController::class,'show']);
Route::get('Locations', [LocationsController::class,'index']);
Route::delete('Locations/{id}/delete', [LocationsController::class,'destroy']);
Route::put('Locations/{id}/update', [LocationsController::class,'update']);
Route::post('Locations/create',[LocationsController::class,'store']);
///////
///TicketCloseModel:
Route::get('TicketCloseModel/{id}/show', [TicketCloseModelController::class,'show']);
Route::get('TicketCloseModel', [TicketCloseModelController::class,'index']);
Route::delete('TicketCloseModel/{id}/delete', [TicketCloseModelController::class,'destroy']);
Route::put('TicketCloseModel/{id}/update', [TicketCloseModelController::class,'update']);
Route::post('TicketCloseModel/create',[TicketCloseModelController::class,'store']);
///////
///Comments:
Route::get('Comments/{id}/show', [CommentsController::class,'show']);
Route::get('Comments', [CommentsController::class,'index']);
Route::delete('Comments/{id}/delete', [CommentsController::class,'destroy']);
Route::put('Comments/{id}/update', [CommentsController::class,'update']);
Route::post('Comments/create',[CommentsController::class,'store']);
///////
///SubCategory:
Route::get('SubCategory/{id}/show', [SubCategoryController::class,'show']);
Route::get('SubCategory', [SubCategoryController::class,'index']);
Route::delete('SubCategory/{id}/delete', [SubCategoryController::class,'destroy']);
Route::put('SubCategory/{id}/update', [SubCategoryController::class,'update']);
Route::post('SubCategory/create',[SubCategoryController::class,'store']);
///////
///Items:
Route::get('Items/{id}/show', [ItemsController::class,'show']);
Route::get('Items', [ItemsController::class,'index']);
Route::delete('Items/{id}/delete', [ItemsController::class,'destroy']);
Route::put('Items/{id}/update', [ItemsController::class,'update']);
Route::post('Items/create',[ItemsController::class,'store']);
///////
///TicketAttachements:
Route::get('TicketAttachements/{id}/show', [TicketAttachementsController::class,'show']);
Route::get('TicketAttachements', [TicketAttachementsController::class,'index']);
Route::delete('TicketAttachements/{id}/delete', [TicketAttachementsController::class,'destroy']);
Route::put('TicketAttachements/{id}/update', [TicketAttachementsController::class,'update']);
Route::post('TicketAttachements/create',[TicketAttachementsController::class,'store']);
///////
///RolePermission:
Route::get('RolePermission/{id}/show', [RolePermissionController::class,'show']);
Route::get('RolePermission', [RolePermissionController::class,'index']);
Route::delete('RolePermission/{id}/delete', [RolePermissionController::class,'destroy']);
Route::put('RolePermission/{id}/update', [RolePermissionController::class,'update']);
Route::post('RolePermission/create',[RolePermissionController::class,'store']);
///////
///CategoryMembers:
Route::get('CategoryMembers/{id}/show', [CategoryMembersController::class,'show']);
Route::get('CategoryMembers', [CategoryMembersController::class,'index']);
Route::delete('CategoryMembers/{id}/delete', [CategoryMembersController::class,'destroy']);
Route::put('CategoryMembers/{id}/update', [CategoryMembersController::class,'update']);
Route::post('CategoryMembers/create',[CategoryMembersController::class,'store']);
///////
///User:
Route::get('User/{id}/show', [UserController::class,'show']);
Route::get('User', [UserController::class,'index']);
Route::delete('User/{id}/delete', [UserController::class,'destroy']);
Route::put('User/{id}/update', [UserController::class,'update']);
Route::post('User/create',[UserController::class,'store']);
///////

    
Route::post('/sample-restful-apis', [ProfileController::class, 'uploadimage'])->name('sample-restful-apis');

Route::put('/profile/update-profile',[ProfileController::class,'update_profile']);
Route::put('/user/{id}', [ProfileController::class, 'update'])->middleware('auth:sanctum');;

Route::get('/user', [ProfileController::class, 'show']);

Route::put('/user/{id}', [AuthController::class, 'update'])->middleware('auth:sanctum');;


// Search
Route::get('/search', [SearchController::class, 'search']);
// Messages
Route::post('messages', [ChatController::class, 'message']);


///// JWT auth
Route::post('login', [JWTController::class,'login']);
Route::post('register', [JWTController::class,'register']);

Route::group(['middleware'=>'api'],function(){
    Route::post('logout', [JWTController::class,'logout']);
    Route::post('refresh', [JWTController::class,'refresh']);
    Route::post('me', [JWTController::class,'me']);
});
//enna

/*// Sanctum auth
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
});*/
