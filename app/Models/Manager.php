<?php

namespace App\Models;

trait Manager
{
    /**
     * @param $param
     * @param $with
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function searchManager($param = [], $with = [])
    {
        $param['role_type'] = self::ROLE_TYPE_MANAGER;
        $this->fill($param);
        $build = $this;
        if ($this->username) {
            $build = $build->where('username', 'like', "%{$this->username}%");
        }
        if ($this->email) {
            $build = $build->where('email', 'like', "%{$this->email}%");
        }
        if ($this->role_type) {
            $build = $build->where('role_type', $this->role_type);
        }
        return $build->with($with)->orderBy('id', 'desc');
    }
}
