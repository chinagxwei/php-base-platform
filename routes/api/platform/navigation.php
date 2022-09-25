<?php

use App\Http\Controllers\V1\Platform\NavigationController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api', 'prefix' => 'v1/navigation'], function ($router) {
    Route::post('index', [NavigationController::class, 'index']);
    Route::post('search',  [NavigationController::class, 'view']);
    Route::post('save',  [NavigationController::class, 'save']);
    Route::post('delete',  [NavigationController::class, 'delete']);
    Route::post('all',  [NavigationController::class, 'all']);
    Route::post('sort-change',  [NavigationController::class, 'sortChange']);
    Route::post('search',  [NavigationController::class, 'search']);
});
