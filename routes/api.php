<?php

$app->get('', 'App\Controllers\Api\LandingController:index');

$app->get('/auth', 'App\Controllers\Api\AuthController:index');

$app->group('/users', function () use ($app) {
   $app->get('', 'App\Controllers\Api\UsersController:readAll');
   $app->get('/orm', 'App\Controllers\Api\UsersController:readAllOrm');
});