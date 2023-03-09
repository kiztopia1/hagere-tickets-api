<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes'
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// user
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
// event
Route::get("/events", [EventController::class, 'index']);
Route::post('/events', [EventController::class, 'store']);
Route::get('/events/{id}', [EventController::class, 'show']);
Route::put('/events/{id}', [EventController::class, 'update']);
Route::delete('/events/{id}', [EventController::class, 'delete']);
Route::get('/events/search/{name}', [EventController::class, 'search']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/events", [EventController::class, 'index']);

Route::get('/test', function (Request $request) {

    try{
        $user = auth()->user();
    }catch(\Tymon\JWTAuth\Exceptions\JWTException $e ){
        return response()->json(['error' => $e->getMessage()]);
    };
    

    return $user->events;
});