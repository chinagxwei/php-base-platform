<?php

namespace App\Models\PlatformNavigation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int parent_id
 * @property string navigation_name
 * @property string navigation_link
 * @property string navigation_router
 * @property int navigation_sort
 * @property string icon
 * @property PlatformNavigation[] subNavigations
 * @property PlatformNavigation parentNavigation
 */
class PlatformNavigation extends Model
{
    use HasFactory, SoftDeletes, PlatformNavigationBuild, PlatformNavigationSearch;

    protected $fillable = [
        'parent_id',
        'navigation_name',
        'navigation_link',
        'navigation_router',
        'navigation_sort',
        'icon',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subNavigations()
    {
        return $this->hasMany(PlatformNavigation::class, 'parent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentNavigation(){
        return $this->belongsTo(PlatformNavigation::class,'id','parent_id');
    }
}
