<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
// use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



// Route::group(['prefix' => 'auth'], function () {
//     Route::post('login', [AuthController::class, 'login']);
//     Route::post('register', [AuthController::class, 'register']);

//     Route::group(['middleware' => 'auth:sanctum'], function() {
//       Route::get('logout', [AuthController::class, 'logout']);
//       Route::get('user', [AuthController::class, 'user']);
//     });
// });


// Route::middleware([EnsureFrontendRequestsAreStateful::class])->group(function () {
    
// Route::post('login',[AuthController::class,'loginUser']);


// Route::group(['middleware' => 'auth:sanctum'],function(){
//     Route::get('user',[AuthController::class,'userDetails']);
//     Route::get('logout',[AuthController::class,'logout']);
//     });
// });
