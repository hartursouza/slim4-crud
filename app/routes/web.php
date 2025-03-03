<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;

$app->get('/', [HomeController::class, 'index']);
$app->get('/users', [UserController::class, 'index']);


