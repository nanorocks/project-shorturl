<?php

if(!isset($_POST))
{
    $_SESSION['msg'] = 'Invalid request for submit.';
    header('Location: /');
    exit;
}

$postToken = $_POST['token'];
$postUrl = htmlspecialchars($_POST['url']);

// check token is valid
if(!isset($_SESSION['token']) || ($_SESSION['token'] != $postToken))
{
    $_SESSION['msg'] = 'Your token is invalid. Reload page.';
    header('Location: /');
    exit;
}

// check url is valid
if(!filter_var($postUrl, FILTER_VALIDATE_URL))
{
    $_SESSION['msg'] = 'Your enter invalid url. Please try again.';
    header('Location: /');
    exit;
}

// generate url
$generateUrl = substr(md5(uniqid($postUrl . time(), true)), 0 ,12);
$_SESSION['genUrl'] = $_SERVER['HTTP_HOST'] . '/id?=' . $generateUrl;

// add url to db

// return url to form
header('Location: /');
exit;