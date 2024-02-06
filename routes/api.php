<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\QuizApiController;
use App\Http\Controllers\API\ForoApiController;
use App\Http\Controllers\API\LeccionesApiController;
use App\Http\Controllers\API\UserApiController;
use App\Http\Controllers\API\RolApiController;
use App\Http\Controllers\API\RespuestasApiController;
use App\Http\Controllers\API\LogroApiController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('quiz', QuizApiController::class);
Route::apiResource('foro', ForoApiController::class);
Route::apiResource('lecciones', LeccionesApiController::class);
Route::apiResource('user', UserApiController::class);
Route::apiResource('rol', RolApiController::class);
Route::apiResource('respuestas', RespuestasApiController::class);
Route::apiResource('logro', LogroApiController::class);


Route::get('api/respuestas-foro/{foroId}', [RespuestasApiController::class,'hola']);



Route::group(['prefix' => 'auth','namespace' => 'App\Http\Controllers',],
     function () {
        Route::post('login', 'AuthController@login');
        Route::post('signup', 'AuthController@signUp');
        Route::group(['middleware' => 'auth:api'],
            
        function() {
            Route::get('logout', 'AuthController@logout');
            Route::get('user', 'AuthController@user');
    });
});


