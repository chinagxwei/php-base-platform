<?php

namespace App\Models\PlatformRole;

use App\Models\PlatformNavigation\PlatformNavigation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property string role_name
 * @property PlatformNavigation[]|\Illuminate\Database\Eloquent\Collection navigations
 */
class PlatformRole extends Model
{
    use HasFactory, SoftDeletes, PlatformRoleSearch, PlatformRoleBuild;

    protected $fillable = [
        'role_name',
    ];

    protected $hidden = [
        'deleted_at', 'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function navigations()
    {
        return $this->belongsToMany(
            PlatformNavigation::class,
            'platform_roles_navigations',
            'role_id',
            'navigation_id'
        )->orderBy('navigation_sort', 'asc');
    }
}
