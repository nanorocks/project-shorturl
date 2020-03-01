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
            'mysql' => [
                'driver'    => 'mysql',
                'host'      => '107.189.6.84',
                'database'  => 'nankovmk_shorturl',
                'username'  => 'nankovmk_shorturl',
                'password'  => 'confusionsnake32;',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ],
            'sqlite' => [
                'driver' => 'sqlite',
                'database' => __DIR__ . '/../Storage/database.sqlite',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ]
        ];

        
    }
}