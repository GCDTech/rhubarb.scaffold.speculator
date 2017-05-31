<?php

namespace Gcd\Speculator\Rhubarb;

use Rhubarb\Crown\Module;

class SpeculatorModule extends Module
{
    protected function registerUrlHandlers()
    {
        parent::registerUrlHandlers();

        $this->addUrlHandlers(
            [
                "/specs/" => new SpeculatorUrlHandler()
            ]
        );
    }
}