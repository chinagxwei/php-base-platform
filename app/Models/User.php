<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ActionLog\ActionLog;
use App\Models\PlatformRole\PlatformRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property int id
 * @property int role_id
 * @property string username
 * @property string email
 * @property string password
 * @property string remember_token
 * @property string email_verified_at
 * @property int role_type
 * @property int status
 * @property PlatformRole role
 */
class User extends Authenticatable implements JWTSubject
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable, UserBuild, UserSearch, Manager;

    const ROLE_TYPE_MANAGER = 1;

    const ROLE_TYPE_WORKER = 2;

    const ROLE_TYPE_MEMBER = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role_id',
        'role_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        // TODO: Implement getJWTIdentifier() method.
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCustomClaims() method.
        return [];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne(PlatformRole::class, 'id', 'role_id')
            ->with(['navigations']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actionLog()
    {
        return $this->hasMany(ActionLog::class, 'user_id', 'id');
    }
}
