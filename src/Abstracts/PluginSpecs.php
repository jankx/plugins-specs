<?php
namespace Jankx\Plugins\Abstracts;

use Jankx\Plugins\Constracts\PluginSpecsConstract;

abstract class PluginSpecs implements PluginSpecsConstract
{
    protected static $instance;

    public static function getInstance() {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}
