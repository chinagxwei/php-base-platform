<?php

namespace App\Services;

use App\Models\User;
use App\Models\Wechat\MiniProgram\WechatMiniprogramAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class Helpers
{
    /**
     * 设置小程序用户的登录信息
     * @param $skey 若skey为abc，最终会取key=mini_abc对应的缓存
     * @param $time 获取缓存时的默认值，设置缓存时为缓存时间(单位分钟)，不是数字或Carbon实例时，则不会缓存数据
     * @return null|string|array
     */
    public static function setMiniSession($skey = null, $data = null, $time = null)
    {
        $time = is_numeric($time) ? intval($time) : ($time instanceof Carbon ? $time : false);
        if ($time !== false && $skey && $data) {
            Cache::put('mini_' . $skey, $data, $time);
        }
    }

    /**
     * 获取小程序用户的登录信息
     * @param $skey 若skey为abc，最终会取key=mini_abc对应的缓存
     * @param $time 获取缓存时的默认值，设置缓存时为缓存时间(单位分钟)，不是数字或Carbon实例时，则不会缓存数据
     * @return null|string|array
     */
    public static function getMiniSession()
    {
        $skey = Request::server('HTTP_MINISESSION', false);
        $user_id = ($skey !== false) ? Cache::get(('mini_' . $skey), 0) : 0;
        return $user_id;
    }

    /**
     * 检查小程序用户的登录信息
     * @param $skey 若skey为abc，最终会取key=mini_abc对应的缓存
     * @param $time 获取缓存时的默认值，设置缓存时为缓存时间(单位分钟)，不是数字或Carbon实例时，则不会缓存数据
     * @return null|string|array
     */
    public static function checkMiniSession()
    {
        $skey = Request::server('HTTP_MINISESSION', false);
        $user_id = ($skey !== false) ? Cache::get(('mini_' . $skey), '') : '';
        // 判断用户是否真实存在
        $chk = WechatMiniprogramAccount::hasAccount($user_id);
        // 重置过期时间
        $chk && Cache::put('mini_' . $skey, $user_id, Config('base.mini_session_expire'));
        return $chk ? $user_id : 0;
    }

    /**
     * 获取小程序用户信息
     * @return User|array
     */
    public static function miniUser()
    {
        $skey = Request::server('HTTP_MINISESSION', false);
        $user_id = ($skey !== false) ? Cache::get(('mini_' . $skey), '') : '';
        /** @var User $user */
        $user = $user_id ? User::with(['miniprogram' => function ($query) {
            $query->select('user_id', 'nickname', 'headimgurl');
        }])->where('id', '=', $user_id)->first() : '';
        if ($user) {
            $user['nickname'] = $user->miniprogram ? $user->miniprogram->nickname : '';
            $user['headimgurl'] = $user->miniprogram ? $user->miniprogram->nickname : '';
            unset($user['miniprogram']);
        }
        return $user ? $user : [];
    }

    /**
     * [msg 返回数据]
     * @param  [type]  $code  [200：成功，203：非授权信息，400：错误请求，500：服务器错误]
     * @param string $msg [description]
     * @param null $obj
     * @param string $url [description]
     * @param integer $count [description]
     * @return false|string [type]         [description]
     */
    public static function msg($code, $msg = '', $obj = null, $url = '', $count = 0)
    {
        $vars = array(
            'code' => $code,
            'msg' => $msg,
            'obj' => $obj,
            'url' => $url,
            'count' => $count,
        );
        return json_encode($vars);
    }
}
