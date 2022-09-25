<?php

use App\Http\Controllers\V1\Platform\RoleController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api', 'prefix' => 'v1/role'], function ($router) {
    Route::post('index', [RoleController::class, 'index']);
    Route::post('save', [RoleController::class, 'save']);
    Route::post('view', [RoleController::class, 'view']);
    Route::post('delete', [RoleController::class, 'delete']);
    Route::post('config-menu', [RoleController::class, 'configMenu']);
    Route::post('search', [RoleController::class, 'search']);
});
