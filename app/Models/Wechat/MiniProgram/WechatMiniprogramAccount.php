<?php

namespace App\Models\Wechat\MiniProgram;

use App\Models\AssociatedUsers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int user_id
 * @property string openid
 * @property string unionid
 * @property string nickname
 * @property int sex
 * @property string city
 * @property string province
 * @property string country
 * @property string headimgurl
 */
class WechatMiniprogramAccount extends Model
{
    use HasFactory, SoftDeletes, AssociatedUsers, WechatMiniprogramAccountSearch;
}
