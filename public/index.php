<?php

session_start();

ini_set('display_errors', 1);

require '../vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();

require '../app/routes/web.php';

$app->run();