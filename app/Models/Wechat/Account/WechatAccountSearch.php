<?php

namespace App\Models\Wechat\Account;

trait WechatAccountSearch
{
    /**
     * @param $user_id
     * @return bool
     */
    public static function hasAccount($user_id)
    {
        return self::where('user_id', $user_id)->exists();
    }

    /**
     * @param $param
     * @param $with
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function search($param = [], $with = [])
    {
        $build = $this->fill($param);
        if ($this->user_id) {
            $build = $build->where('user_id', $this->user_id);
        }
        if ($this->openid) {
            $build = $build->where('openid', 'like', "%{$this->openid}%");
        }
        if ($this->unionid) {
            $build = $build->where('unionid', 'like', "%{$this->unionid}%");
        }
        if ($this->nickname) {
            $build = $build->where('nickname', 'like', "%{$this->nickname}%");
        }
        if ($this->sex) {
            $build = $build->where('sex', $this->sex);
        }
        if ($this->city) {
            $build = $build->where('city', 'like', "%{$this->city}%");
        }
        if ($this->province) {
            $build = $build->where('province', 'like', "%{$this->province}%");
        }
        if ($this->country) {
            $build = $build->where('country', 'like', "%{$this->country}%");
        }
        if ($this->subscribe) {
            $build = $build->where('subscribe', $this->subscribe);
        }
        return $build->with($with)->orderBy('id', 'desc');
    }

    /**
     * @param $id
     * @param array $with
     * @return $this
     */
    public static function findOneByID($id, $with = [])
    {
        return self::where('id', $id)->with($with)->first();
    }
}
