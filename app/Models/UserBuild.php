<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

trait UserBuild
{
    /**
     * @param $role_type
     * @return $this
     */
    public function setRoleType($role_type)
    {
        $this->role_type = $role_type;
        return $this;
    }

    /**
     * @param $role_id
     * @return $this
     */
    public function setRoleID($role_id){
        $this->role_id = $role_id;
        return $this;
    }

    /**
     * @param $username
     * @param $newPassword
     * @param $oldPassword
     * @return bool
     */
    public static function resetPassword($username, $newPassword, $oldPassword)
    {
        if (Auth::validate(['username' => $username, 'password' => $oldPassword])) {
            $module = self::findOneByUsername($username);
            $module->password = bcrypt($newPassword);
            return $module->save();
        }
        return false;
    }

    /**
     * @param $param
     * @param $role_type
     * @return bool
     */
    public function register($param, $role_type)
    {
        $param['email'] = "{$param['username']}@gxcatv.com";
        $param['password'] = bcrypt($param['password']);
        $param['role_type'] = $role_type;
        return $this->fill($param)->save();
    }

    /**
     * @param $param
     * @return bool
     */
    public function registerManager($param)
    {
        return $this->register($param, self::ROLE_TYPE_MANAGER);
    }

    /**
     * @param $param
     * @return bool
     */
    public function registerWorker($param)
    {
        return $this->register($param, self::ROLE_TYPE_WORKER);
    }

    /**
     * @param $param
     * @return bool
     */
    public function registerMember($param)
    {
        return $this->register($param, self::ROLE_TYPE_MEMBER);
    }
}
