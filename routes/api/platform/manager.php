<?php

use App\Http\Controllers\V1\Platform\ManagerController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api', 'prefix' => 'v1/manager'], function ($router) {
    Route::post('index', [ManagerController::class, 'index']);
    Route::post('view', [ManagerController::class, 'view']);
    Route::post('save', [ManagerController::class, 'save']);
    Route::post('delete', [ManagerController::class, 'delete']);
});
