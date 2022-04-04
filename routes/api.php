<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("dashbord",[UserController::class,'dashbord']);
Route::get("login/{email}/{password}",[UserController::class,'login']);
Route::get("users",[UserController::class,'indexall']);
Route::post("register",[UserController::class,'register']);
//Route::post('/user/register', [UserController::class, 'register']);
