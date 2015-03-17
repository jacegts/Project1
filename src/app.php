<?php

require 'Config/bootstrap.php';

/**
 * @var \Common\Http\SimpleRequest();
 */
$request = new \Common\Http\SimpleRequest($_SERVER);

/**
 * @var \Common\Routers\SimpleRouter()
 */
$router = new \Common\Routers\SimpleRouter($config['app']['uri-mappings']);

$router->handle($request);
