<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
    return $request->user();
});

Route::post("/login", [\App\Http\Controllers\API\Authentication::class, "login"])->name("login");

Route::get("/file/{file}", [\App\Http\Controllers\API\FilesController::class, "show"])
    ->middleware("guest")
    ->name("file.show");
Route::middleware("auth:sanctum")
    ->resource("/file", \App\Http\Controllers\API\FilesController::class)
    ->only(["store", "destroy"]);
