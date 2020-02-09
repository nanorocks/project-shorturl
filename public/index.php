<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use Pimple\Container;
use App\Bootstrap\ServiceProvider;
use App\Bootstrap\RequestHandler;

$pimple = new Container();
ServiceProvider::start($pimple);
RequestHandler::start($pimple, $pimple['route']);
