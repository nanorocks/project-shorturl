<?php

namespace App\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ConfigProvider
 * @package App\Provider
 */
class ConfigProvider implements ServiceProviderInterface
{
    /**
     * @param Container $container
     */
    public function register(Container $container) : void
    {
        $container['settings'] = [
            'twig' => [
                'path' => __DIR__ . '/../View/',
                'cache' => false
            ],
        ];
    }
}