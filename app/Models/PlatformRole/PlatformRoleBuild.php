<?php

namespace App\Models\PlatformRole;

trait PlatformRoleBuild
{
    /**
     * @param $role_name
     * @return bool
     */
    public function generate($role_name)
    {
        $this->role_name = $role_name;
        return $this->save();
    }
}
