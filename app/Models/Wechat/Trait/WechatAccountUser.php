<?php

namespace App\Models\Wechat\Trait;

use App\Models\Wechat\Account\WechatAccount;

/**
 * @property WechatAccount wechatAccount
 */
trait WechatAccountUser
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wechatAccount()
    {
        return $this->hasOne(WechatAccount::class, 'user_id', 'id');
    }
}
