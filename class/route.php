<?php

$request = $_SERVER['REQUEST_URI'];
define('BASE_PATH', __DIR__);

switch ($request) {
    case '/' :
        require_once BASE_PATH . '/../templates/form.php';
        break;
    case '/url' :
        require_once BASE_PATH . '/../class/url.php';
        break;
    case '/id' :
        require_once BASE_PATH . '/../class/redirect.php';
        break;
    default:
        die('404 page not found');
        break;
}