<?php

namespace App\Models;

trait UserSearch
{

    /**
     * @param $username
     * @param array $with
     * @return $this|null
     */
    public static function findOneByUsername($username, $with = [])
    {
        return self::where('username', $username)->with($with)->first();
    }

    /**
     * @param $user_id
     * @param array $with
     * @return $this|null
     */
    public static function findOneByUserID($user_id, $with = [])
    {
        return self::where('id', $user_id)->with($with)->first();
    }
}
