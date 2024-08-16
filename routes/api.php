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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/me', function() {
//     return env('APP_NAME');
// });
// Route::get('/get', function() {
//     return session()->get('theme');
// });
// Route::post('/post', function(Request $request) {
//     env('APP_NAME', '$request->param_1');
//     return  session()->get('theme');
// });
