<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;

$app->get('/', [HomeController::class, 'index']);

$app->group('/users', function ($group) {
    $group->get('', [UserController::class, 'index']);
    $group->get('/create', [UserController::class, 'create']);
});


