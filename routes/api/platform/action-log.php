<?php

use App\Http\Controllers\ActionLogController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api', 'prefix' => 'v1/action-log/'], function ($router) {
    Route::any('index', [ActionLogController::class, 'index']);
});
