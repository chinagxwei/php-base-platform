<?php

namespace App\Http\Middleware;
use App\Services\Helpers;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Overtrue\Socialite\User as SocialiteUser;

class AuthMiniProgram
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return \Illuminate\Http\Response|mixed
     */
    public function handle($request, Closure $next) {
        $user_id = Helpers::checkMiniSession();
        if(empty($user_id)){ // 跳往登录界面
            return Response::make(Helpers::msg(403, '请先登录'));
        }
        return $next($request);
    }


}
