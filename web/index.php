<?php
if (false == isset($_SERVER['SYMFONY_ENV'], $_SERVER['SYMFONY_DEBUG'])) {
    http_response_code(500);
    die('Internal error. The environment is not configured proper way.');
}

require_once __DIR__.'/../app/bootstrap.php.cache';
require_once __DIR__.'/../app/AppKernel.php';

use Symfony\Component\HttpFoundation\Request;

$kernel = new AppKernel((string) $_SERVER['SYMFONY_ENV'], (bool) $_SERVER['SYMFONY_DEBUG']);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);