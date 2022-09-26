<?php

namespace App\Models\ActionLog;

use App\Models\AssociatedUsers;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int user_id
 * @property string action_name
 * @property string action_description
 */
class ActionLog extends Model
{
    use  SoftDeletes, HasFactory, ActionLogBuild, ActionLogSearch, AssociatedUsers;

    protected $fillable = [
        'user_id',
        'action_name',
        'action_description',
    ];
}
