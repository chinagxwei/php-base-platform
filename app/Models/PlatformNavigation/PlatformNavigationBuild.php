<?php

namespace App\Models\PlatformNavigation;

trait PlatformNavigationBuild
{
    /**
     * @param $navigation_name
     * @return $this
     */
    public function setNavigationName($navigation_name)
    {
        $this->navigation_name = $navigation_name;
        return $this;
    }

    /**
     * @param $navigation_link
     * @return $this
     */
    public function setNavigationLink($navigation_link)
    {
        $this->navigation_link = $navigation_link;
        return $this;
    }

    /**
     * @param $navigation_router
     * @return $this
     */
    public function setNavigationRouter($navigation_router)
    {
        $this->navigation_router = $navigation_router;
        return $this;
    }

    /**
     * @param $navigation_sort
     * @return $this
     */
    public function setNavigationSort($navigation_sort)
    {
        $this->navigation_sort = $navigation_sort;
        return $this;
    }

    /**
     * @param $icon
     * @return $this
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }
}
