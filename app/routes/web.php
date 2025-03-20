<?php

use App\Controllers\LoginController;
use App\Controllers\HomeController;
use App\Controllers\UserController;

$app->get('/', [HomeController::class, 'index']);
$app->get('/login', [LoginController::class, 'index']);
$app->post('/login', [LoginController::class, 'store']);
$app->get('/loggout', [LoginController::class, 'loggout']); 

$app->group('/users', function ($group) {
    $group->get('', [UserController::class, 'index']);
    $group->get('/create', [UserController::class, 'create']);
    $group->post('/store', [UserController::class, 'store']);
    $group->get('/update/{id}', [UserController::class, 'edit']);
    $group->put('/update', [UserController::class, 'update']);
    $group->delete('/delete/{id}', [UserController::class, 'destroy']);
});


