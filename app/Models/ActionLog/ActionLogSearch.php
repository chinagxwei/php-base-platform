<?php

namespace App\Models\ActionLog;

trait ActionLogSearch
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
        if ($this->action_name) {
            $build = $build->where('action_name', 'like', "%{$this->action_name}%");
        }
        if ($this->action_description) {
            $build = $build->where('action_description', 'like', "%{$this->action_description}%");
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
}
