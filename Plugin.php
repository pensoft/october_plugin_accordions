<?php namespace Pensoft\Accordions;

use Pensoft\Accordions\Components\Accordion;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            Accordion::class => 'accordion'
        ];
    }

    public function registerSettings()
    {
    }
}
