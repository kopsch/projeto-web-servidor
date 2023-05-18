<?php
use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Src\Controllers\UserController;
use Src\Controllers\ViewController;
use Src\Http\Middlewares\JWTAuth;

Router::error(function(Request $request, Exception $exception) {
    if ($exception instanceof NotFoundHttpException) {
        header('Location: /');
        exit;
    }

    echo 'Erro: ' . $exception->getMessage();
});

// ROTAS DE VIEW
Router::get('/', [ViewController::class, 'index']);
Router::get('/login', [ViewController::class, 'login']);
Router::get('/register', [ViewController::class, 'register']);

Router::group(['middleware' => JWTAuth::class], function() {
    Router::get('/cart', [ViewController::class, 'cart']);
    Router::get('/payment', [ViewController::class, 'payment']);
});


// ROTAS DE API
Router::group(['prefix' => '/api', 'middleware' => JWTAuth::class], function() {
    Router::get('/users/me', [UserController::class, 'getAuthenticatedUser']);
});

Router::group(['prefix' => '/api'], function () {
    Router::post('/register', [UserController::class, 'store']);
    Router::post('/auth', [UserController::class, 'authenticate']);
});

Router::start();