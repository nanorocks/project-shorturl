<?php

namespace App\Bootstrap;

use App\Provider\AppProvider;
use App\Provider\ConfigProvider;
use App\Provider\ErrorProvider;
use App\Provider\RouteProvider;
use App\Provider\TemplateProvider;
use Pimple\Container;

class ServiceProvider
{
    public static function start(Container $pimple) : Container
    {
        $pimple->register(new RouteProvider())
            ->register(new ConfigProvider())
            ->register(new TemplateProvider())
            ->register(new ErrorProvider());

        return $pimple;
    }
}