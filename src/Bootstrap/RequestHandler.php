<?php

namespace App\Bootstrap;

use App\Controller\StoreUrlController;
use App\Controller\ViewUrlPageController;
use Bramus\Router\Router;
use Pimple\Container;

class RequestHandler
{
    /**
     * @param Container $container
     * @param \Bramus\Router\Router $router
     */
    public static function start(Container $container, Router $router)
    {
        $router->get('/',  function () use ($container){
            $ins = new ViewUrlPageController(
                $container['twig'],
                $container['db']['conn']
            );
            $ins->load();
        });

        $router->post('/store',  function () use ($container){
            $ins = new StoreUrlController(
                $container['twig'],
                $container['db']['conn']
            );
            $ins->load();
        });

        $router->get('/',  function () use ($container){
            $ins = new StoreUrlController($container['twig']);
            $ins->load();
        });

//        $router->get('/u', 'App\Controller\RedirectUrlController@index');

        $router->set404(function () use ($container){
            return $container['err404'];
        });

        $router->run();
    }
}