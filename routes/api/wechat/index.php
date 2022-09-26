<?php

use App\Services\Helpers;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'authMiniProgram',
    'prefix' => 'wechat/v1/mini-program'
], function () {
//    Route::any('getUserInfo', function () {
//        $ret = [
//            'userInfo' => Helpers::miniUser(),
//        ];
//        return Helpers::msg(200, 'ok', $ret);
//    });
});
