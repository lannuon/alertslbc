<?php
/**
 * Created by PhpStorm.
 * User: Tibox
 * Date: 22/11/2014
 * Time: 16:09
 */
//
//$app->get("/", function() {
//    return "Hello world";
//});

$app->post('/users/create','app\controllers\UsersController::create');
$app->post('/users/login','app\controllers\UsersController::login');

