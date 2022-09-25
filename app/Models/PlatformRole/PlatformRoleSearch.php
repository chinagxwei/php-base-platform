<?php

namespace App\Models\PlatformRole;

trait PlatformRoleSearch
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
        if ($this->role_name) {
            $build = $build->where('role_name', 'like', "%{$this->role_name}%");
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
        return self::select($select)->with($with)->get();
    }
}
