<?php

use App\Http\Controllers\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix'=> 'tokens', 'namespace'=>"App\Http\Controllers\Api"], function () {
    Route::post("create", [TokenController::class, "store"]);
    Route::get("validate", [TokenController::class, "validate"]);
    Route::delete("delete", [TokenController::class, "destroy"]);
});
