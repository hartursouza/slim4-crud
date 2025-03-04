<?php

session_start();

ini_set('display_errors', 1);

require '../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Middleware\MethodOverrideMiddleware;

$app = AppFactory::create();

require '../app/routes/web.php';

$methodOverridingMiddleware = new MethodOverrideMiddleware();
$app->add($methodOverridingMiddleware);

$app->run();