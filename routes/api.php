<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/student',[StudentController::class,'index']);
Route::get('/student/{id}',[StudentController::class,'show']);
Route::get('/student/search/{name}',[StudentController::class,'search']);

Route::POST('/register',[AuthController::class,'register']);

Route::POST('/login',[AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('/student',[StudentController::class,'store']);
    Route::delete('/student/{id}',[StudentController::class,'destroy']);
    Route::put('/student/{id}',[StudentController::class,'update']);

    Route::POST('/logout',[AuthController::class,'logout']);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
