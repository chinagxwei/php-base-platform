<?php

namespace App\Models\Wechat\Trait;

use App\Models\Wechat\MiniProgram\WechatMiniprogramAccount;

/**
 * @property WechatMiniprogramAccount miniprogram
 */
trait MiniProgramUser
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function miniprogram()
    {
        return $this->hasOne(WechatMiniprogramAccount::class, 'user_id', 'id');
    }
}
