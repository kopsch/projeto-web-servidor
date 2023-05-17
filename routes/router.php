<?php
use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter as Router;
use Src\Controllers\HomeController;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Src\Controllers\UserController;
use Src\Http\Middlewares\JWTAuth;

Router::error(function(Request $request, Exception $exception) {
    if ($exception instanceof NotFoundHttpException) {
        header('Location: /');
        exit;
    }

    echo 'Erro: ' . $exception->getMessage();
});


Router::get('/', [HomeController::class, 'index']);

Router::group(['prefix' => '/api'], function () {
    Router::post('/register', [UserController::class, 'store']);
    Router::post('/auth', [UserController::class, 'authenticate']);
});

Router::group(['middleware' => JWTAuth::class], function() {
    Router::get('/profile', [HomeController::class, 'profile']);
    Router::get('api/users/me', [UserController::class, 'getAuthenticatedUser']);
});

Router::start();