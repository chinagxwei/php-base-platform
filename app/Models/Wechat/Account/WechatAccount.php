<?php

namespace App\Models\Wechat\Account;

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
 * @property int subscribe
 * @property string subscribe_at
 * @property string unsubscribe_at
 */
class WechatAccount extends Model
{
    use HasFactory, SoftDeletes, AssociatedUsers, WechatAccountSearch;
}
