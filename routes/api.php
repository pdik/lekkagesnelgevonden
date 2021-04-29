<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/**
 * Get All detials options
 */
Route::prefix('v1')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });

    Route::delete('/report/row/{id?}', [\App\Http\Controllers\Api\V1\ReportRowsController::class,'destroy']);
    Route::post('/report/{id?}/send', [\App\Http\Controllers\Api\V1\ReportController::class,'send']);
    Route::post('/files/upload', [\App\Http\Controllers\Api\V1\ImageController::class,'upload']); //Upload image
    Route::get('/detials/contact', [\App\Http\Controllers\Api\V1\DetialsController::class,'index']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
