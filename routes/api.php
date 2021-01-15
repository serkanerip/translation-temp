<?php

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

use Epigra\Translation\Http\Controllers\Api\TranslationApiController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->name('api::')->group(function () {
    Route::apiResource('translations', TranslationApiController::class, [
            "only" => ['index']
        ]);
    Route::get('translations/{group}/{key}', 'TranslationApiController@getTranslationByKey')->name('translation.byKey');
});
