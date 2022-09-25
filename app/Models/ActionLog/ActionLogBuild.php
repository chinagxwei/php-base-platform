<?php

namespace App\Models\ActionLog;

trait ActionLogBuild
{
    /**
     * @param $user_id
     * @return $this
     */
    public function setUserID($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @param $action_name
     * @return $this
     */
    public function setActionName($action_name)
    {
        $this->action_name = $action_name;
        return $this;
    }

    /**
     * @param $action_description
     * @return $this
     */
    public function setActionDescription($action_description)
    {
        $this->action_description = $action_description;
        return $this;
    }

    /**
     * @param $user_id
     * @param $action_name
     * @param $action_description
     * @return bool
     */
    public function generate($user_id, $action_name, $action_description)
    {
        return $this->setUserID($user_id)
            ->setActionName($action_name)
            ->setActionDescription($action_description)
            ->save();
    }
}
