<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;

$app->get('/', [HomeController::class, 'index']);

$app->group('/users', function ($group) {
    $group->get('', [UserController::class, 'index']);
    $group->get('/create', [UserController::class, 'create']);
    $group->post('/store', [UserController::class, 'store']);
    $group->get('/update/{id}', [UserController::class, 'updateForm']);
    $group->put('/update/{id}', [UserController::class, 'update']);
    $group->delete('/delete', [UserController::class, 'destroy']);
    $group->get('/delete', [UserController::class, 'delete']);
});


