<?php
namespace Jankx\Plugins\Sliders;

use Jankx\Plugins\Abstracts\PluginSpecs;
use Jankx\Plugins\Constracts\SliderPlugin;
use Nextend\Framework\Pattern\MVCHelperTrait;
use Nextend\SmartSlider3\Application\Model\ModelSliders;
use Nextend\SmartSlider3\SmartSlider3;

class SmartSlider extends PluginSpecs implements SliderPlugin
{
    use MVCHelperTrait;

    protected static function checkSmartSliderPluginIsActive() {
        if (class_exists(SmartSlider3::class)) {
            return true;
        }
        return false;
    }

    /**
     * Get active sliders
     */
    public static function getActiveSliders() {
        if (!static::checkSmartSliderPluginIsActive()) {
            return array();
        }

        $status = '*';

        $smartSliderSpecs = static::getInstance();
        $slidersModel = new ModelSliders($smartSliderSpecs);

        return $slidersModel->getAll(
            null,
            $status,
            "time",
            "DESC"
        );
    }

    /**
     * Return array list slider ID=>Name
     */
    public static function getActiveSlidersArray() {
        $sliders = array();

        foreach(static::getActiveSliders() as $slider) {
            $sliders[array_get($slider, 'id')] = array_get($slider, 'title');
        }

        return $sliders;
    }
}
