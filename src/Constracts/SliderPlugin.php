<?php
namespace Jankx\Plugins\Constracts;

interface SliderPlugin
{
    /**
     * Get active sliders
     */
    public static function getActiveSliders();

    /**
     * Return array list slider ID=>Name
     */
    public static function getActiveSlidersArray();
}
