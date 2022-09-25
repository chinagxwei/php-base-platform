<?php

namespace App\Models\PlatformNavigation;

trait PlatformNavigationSearch
{
    /**
     * @param $param
     * @param $with
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function search($param = [], $with = [])
    {
        $this->fill($param);
        $build = $this;
        if ($this->navigation_name) {
            $build = $build->where('navigation_name', 'like', "%{$this->navigation_name}%");
        }
        if ($this->navigation_link) {
            $build = $build->where('navigation_link', 'like', "%{$this->navigation_link}%");
        }
        if ($this->navigation_router) {
            $build = $build->where('navigation_router', 'like', "%{$this->navigation_router}%");
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

    /**
     * @param $with
     * @param $select
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function findAll($with = [], $select = ['*'])
    {
        return self::select($select)->with($with)->orderBy('navigation_sort', 'asc')->get();
    }
}
