<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get("/user",function(Request $request){
    return $request->user() ?? ["id"=>1];
});

Route::middleware('auth')->get('/auth/user', function (Request $request) {
    return $request->user();
});

Route::get("/user", function(Request $request){
    return ["id" => 1];
});
// Route::middleware('auth:sanctum')->get('/', [DashboardController::class, 'index']);
