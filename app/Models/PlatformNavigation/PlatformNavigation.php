<?php

namespace App\Models\PlatformNavigation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property string navigation_name
 * @property string navigation_link
 * @property string navigation_router
 * @property int navigation_sort
 * @property string icon
 */
class PlatformNavigation extends Model
{
    use HasFactory, SoftDeletes, PlatformNavigationBuild, PlatformNavigationSearch;

    protected $fillable = [
        'navigation_name',
        'navigation_link',
        'navigation_router',
        'navigation_sort',
        'icon',
    ];
}
